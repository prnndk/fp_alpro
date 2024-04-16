@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>User Data {{$pemilik->user->name}}</h3>
                {{Breadcrumbs::render('pemilikDetail',$pemilik)}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Filled Data </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone"
                                           class="form-control round"
                                           placeholder="081234567890"
                                           name="phone" value="{{old('phone',$pemilik->phone)}}" maxlength="13" minlength="10" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address"
                                           class="form-control round"
                                           placeholder="Jalan Teknik Kimia"
                                           name="address" value="{{old('address',$pemilik->address)}}" disabled>
                                    @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="user_id">Select User</label>
                                    <select class="choices form-select"
                                            name="user_id" id="user_id" required>
                                                <option value="{{$pemilik->user_id}}" selected disabled>{{$pemilik->user->name}}</option>
                                    </select>
                                </div>
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
