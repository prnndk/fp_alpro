@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Make new Kendaraan Data</h3>
                {{Breadcrumbs::render('kendaraanCreate')}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>New Kendaraan </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{route('admin.kendaraan.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Kendaraan</label>
                                    <input type="text" id="name"
                                           class="form-control round @error('name') is-invalid @enderror"
                                           placeholder="Please Input Name Here"
                                           name="name" value="{{old('name')}}" required>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk Kendaraan</label>
                                    <input type="text" id="merk"
                                           class="form-control round @error('merk') is-invalid @enderror"
                                           placeholder="Please Input Merk Kendaraan Here"
                                           name="merk" value="{{old('merk')}}" required>
                                    @error('merk')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="plat_nomor">Plat Nomor Kendaraan</label>
                                    <input type="text" id="plat_nomor"
                                           class="form-control round @error('plat_nomor') is-invalid @enderror"
                                           placeholder="Please Input Plat Nomor Kendaraan Here"
                                           name="plat_nomor" value="{{old('plat_nomor')}}" required>
                                    @error('plat_nomor')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" id="harga"
                                           class="form-control round @error('harga') is-invalid @enderror"
                                           placeholder="Please Input Harga Here"
                                           name="harga" value="{{old('harga')}}" required>
                                    @error('harga')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="warna">Warna Kendaraan</label>
                                    <input type="text" id="warna"
                                           class="form-control round @error('warna') is-invalid @enderror"
                                           placeholder="Please Input Warna Kendaraan Here"
                                           name="warna" value="{{old('warna')}}" required>
                                    @error('warna')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kondisi">Kondisi Kendaraan</label>
                                    <input type="text" id="kondisi"
                                           class="form-control round @error('kondisi') is-invalid @enderror"
                                           placeholder="Input Kondisi Here"
                                           name="kondisi" value="{{old('kondisi')}}" required>
                                    @error('kondisi')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tipe_kendaraan_id">Select Tipe Kendaraan</label>
                                    <select class="choices form-select @error('tipe_kendaraan_id') is-invalid @enderror"
                                            name="tipe_kendaraan_id" id="tipe_kendaraan_id" required>
                                        @if(!old('tipe_kendaraan_id'))
                                            <option value="" disabled selected>Select Tipe Kendaraan</option>
                                        @endif
                                        @foreach($tipe_kendaraans as $tipe_kendaraan)
                                            @if(old('tipe_kendaraan_id') == $tipe_kendaraan->id)
                                                <option value="{{$tipe_kendaraan->id}}" selected>{{$tipe_kendaraan->name}}</option>
                                            @else
                                                <option value="{{$tipe_kendaraan->id}}">{{$tipe_kendaraan->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('tipe_kendaraan_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pemilik_id">Select Pemilik</label>
                                    <select class="choices form-select @error('pemilik_id') is-invalid @enderror"
                                            name="pemilik_id" id="pemilik_id" required>
                                        @if(!old('pemilik_id'))
                                            <option value="" disabled selected>Select Pemilik</option>
                                        @endif
                                        @foreach($pemiliks as $pemilik)
                                            @if(old('pemilik_id') == $pemilik->id)
                                                <option value="{{$pemilik->id}}" selected>{{$pemilik->user->name}}</option>
                                            @else
                                                <option value="{{$pemilik->id}}">{{$pemilik->user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('pemilik_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input type="file" class="image-preview-filepond" name="image" id="image">
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
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    @vite('resources/js/pages/form-element-select.js')
    @vite('resources/js/pages/filepond.js')
@endsection
