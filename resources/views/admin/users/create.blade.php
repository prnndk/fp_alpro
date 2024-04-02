@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Users List</h3>
        {{Breadcrumbs::render('userCreate')}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4>Create New User</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <form action="{{route('users.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control round @error('name') is-invalid @enderror"
                                           placeholder="Input Name Here"
                                           name="name" value="{{old('name')}}" required>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control round @error('email') is-invalid @enderror"
                                           placeholder="Input Email Here"
                                           name="email" value="{{old('email')}}" required>
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control round @error('password') is-invalid @enderror"
                                           placeholder="*******"
                                           name="password" required>
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="choices form-select @error('role') is-invalid @enderror" name="role" id="role" required>
                                        <option value="" disabled selected>Select Role</option>
                                        <option value="{{\App\Enums\RolesType::OWNER->value}}">Owner</option>
                                        <option value="{{\App\Enums\RolesType::USER->value}}">User</option>
                                        <option value="{{\App\Enums\RolesType::ADMIN->value}}">Admin</option>
                                    </select>
                                    @error('role')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('styles')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
    />
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    @vite('resources/js/pages/form-element-select.js')
@endsection
