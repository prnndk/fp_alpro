<?php

namespace App\Http\Controllers;

use App\Enums\RolesType;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == RolesType::ADMIN) {
                return redirect()->intended(route('admin.dashboard'));
            } elseif (Auth::user()->role == RolesType::OWNER) {
                return redirect()->intended(route('owner.dashboard'));
            } else {
                return redirect()->intended(route('user.dashboard'));
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function register(): View
    {
        return view('auth.register');
    }
    public function postRegister(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => RolesType::USER
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error',$e->getMessage())->withInput();
        }

        return redirect(route('login'))->with('success', 'Register success, please login');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
