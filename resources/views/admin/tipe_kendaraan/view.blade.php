@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>View Tipe Kendaraan</h3>
        {{Breadcrumbs::render('tipeDetail',$tipeKendaraan)}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tipe Kendaraan {{$tipeKendaraan->name}} </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name"
                                           class="form-control round"
                                           name="name" value="{{old('name',$tipeKendaraan->name)}}" disabled readonly>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
