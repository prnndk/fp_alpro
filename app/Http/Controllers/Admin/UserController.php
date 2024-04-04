<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RolesType;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $title = 'Delete User!';
        $text = 'Are you sure you want to delete this user?';
        confirmDelete($title, $text);
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:dns|unique:users,email',
            'password' => ['required','string',Password::min(8)->numbers()],
            'role' => [Rule::enum(RolesType::class), 'required']
        ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $validate['name'],
                'email' => $validate['email'],
                'password' => bcrypt($validate['password']),
                'role' => $validate['role']
            ]);
            DB::commit();
            return redirect(route('users.index'))->with('success', 'User created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('errors', 'User creation failed');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('admin.users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $roles = RolesType::getValues();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) : RedirectResponse
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => ['required','email:dns', Rule::unique('users')->ignore($user->id)],
            'role' => [Rule::enum(RolesType::class), 'required'],
        ]);
        //if password changed validate then bcrypt
        if ($request->filled('password')||$request->password!=null) {
        $validate = $request->validate([
                'password' => ['required','string',Password::min(8)->numbers()],
            ]);
            $validate['password'] = bcrypt($request->password);
        }

        DB::beginTransaction();
        try {
            $user->update($validate);
            DB::commit();
            return redirect(route('users.index'))->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('errors', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
            return redirect(route('users.index'))->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('errors', 'User deletion failed');
        }
    }
}
