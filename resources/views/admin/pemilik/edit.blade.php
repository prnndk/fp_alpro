@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Filled User Data</h3>
                {{Breadcrumbs::render('pemilikEdit',$pemilik)}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Filled Data </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <form action="{{route('pemilik.update',$pemilik->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone"
                                           class="form-control round @error('phone') is-invalid @enderror"
                                           placeholder="081234567890"
                                           name="phone" value="{{old('phone',$pemilik->phone)}}" required maxlength="13" minlength="10">
                                    @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address"
                                           class="form-control round @error('address') is-invalid @enderror"
                                           placeholder="Jalan Teknik Kimia"
                                           name="address" value="{{old('address',$pemilik->address)}}" required>
                                    @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="user_id">Select User</label>
                                    <select class="choices form-select @error('user_id') is-invalid @enderror"
                                            name="user_id" id="user_id" required>
                                        @foreach($users as $user)
                                            @if(old('user_id',$pemilik->user_id) == $user->id)
                                                <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                            @else
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Edit Data</button>
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
