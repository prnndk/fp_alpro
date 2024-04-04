@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Create Tipe Kendaraan</h3>
        {{--        {{Breadcrumbs::render('userCreate')}}--}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Fill Data Here </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <form action="{{route('tipe_kendaraan.update',$tipeKendaraan->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name"
                                           class="form-control round @error('name') is-invalid @enderror"
                                           placeholder="Please Input Name Here"
                                           name="name" value="{{old('name',$tipeKendaraan->name)}}" required>
                                    @error('name')
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
