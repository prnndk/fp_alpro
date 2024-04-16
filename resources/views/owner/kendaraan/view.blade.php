@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>View Kendaraan Data</h3>
        {{Breadcrumbs::render('kendaraanOwnerShow',$kendaraan)}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>View {{$kendaraan->name}} data </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nama Kendaraan</label>
                                <input type="text" id="name"
                                       class="form-control round"
                                       name="name" value="{{old('name',$kendaraan->name)}}" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="merk">Merk Kendaraan</label>
                                <input type="text" id="merk"
                                       class="form-control round"
                                       name="merk" value="{{old('merk',$kendaraan->merk)}}" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="plat_nomor">Plat Nomor Kendaraan</label>
                                <input type="text" id="plat_nomor"
                                       class="form-control round"
                                       name="plat_nomor" value="{{old('plat_nomor',$kendaraan->plat_nomor)}}" disabled
                                       readonly>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" id="harga"
                                       class="form-control round"
                                       name="harga" value="{{old('harga',$kendaraan->harga)}}" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="warna">Warna Kendaraan</label>
                                <input type="text" id="warna"
                                       class="form-control round"
                                       name="warna" value="{{old('warna',$kendaraan->warna)}}" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi Kendaraan</label>
                                <input type="text" id="kondisi"
                                       class="form-control round"
                                       name="kondisi" value="{{old('kondisi',$kendaraan->kondisi)}}" disabled readonly>
                            </div>
                            <div class="form-group">
                                <label for="tipe_kendaraan_id">Tipe Kendaraan</label>
                                <select class="choices form-select"
                                        name="tipe_kendaraan_id" id="tipe_kendaraan_id">
                                    <option value="{{$kendaraan->tipe_kendaraan_id}}" selected
                                            disabled>{{$kendaraan->tipe_kendaraan->name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pemilik_id">Pemilik</label>
                                <select class="choices form-select"
                                        name="pemilik_id" id="pemilik_id">
                                    <option value="{{$kendaraan->pemilik_id}}" selected
                                            disabled>{{$kendaraan->pemilik->user->name}}</option>
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
