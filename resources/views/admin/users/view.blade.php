@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Users Details</h3>
        {{Breadcrumbs::render('userShow',$user->id)}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4>Data User {{$user->name}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control round"
                                           placeholder="Input Name Here"
                                           name="name" value="{{$user->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control round"
                                           placeholder="Input Email Here"
                                           name="email" value="{{$user->email}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="choices form-select" name="role" id="role" disabled readonly>
                                       <option value="{{$user->role->value}}">{{$user->role}}</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

