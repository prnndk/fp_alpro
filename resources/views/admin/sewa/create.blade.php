@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Buat Sewa Kendaraan</h3>
        {{--        {{Breadcrumbs::render('userCreate')}}--}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>New Sewa </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{route('admin.sewa.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="tanggal_sewa">Tanggal Sewa</label>
                                    <input type="date" id="tanggal_sewa"
                                           class="form-control round @error('tanggal_sewa') is-invalid @enderror"
                                           name="tanggal_sewa" value="{{old('tanggal_sewa')}}" required>
                                    @error('tanggal_sewa')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_perkiraan_kembali">Tanggal Akhir Sewa</label>
                                    <input type="date" id="tanggal_perkiraan_kembali"
                                           class="form-control round @error('tanggal_perkiraan_kembali') is-invalid @enderror"
                                           name="tanggal_perkiraan_kembali" value="{{old('tanggal_perkiraan_kembali')}}" required>
                                    @error('tanggal_perkiraan_kembali')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kendaraan_id">Select Kendaraan</label>
                                    <select class="choices form-select @error('kendaraan_id') is-invalid @enderror"
                                            name="kendaraan_id" id="kendaraan_id" required>
                                        @if(!old('kendaraan_id'))
                                            <option value="" disabled selected>Select Kendaraan</option>
                                        @endif
                                        @foreach($kendaraans as $kendaraan)
                                            @if(old('kendaraan_id') == $kendaraan->id)
                                                <option value="{{$kendaraan->id}}" selected>{{$kendaraan->name ." milik ". $kendaraan->pemilik->user->name}}</option>
                                            @else
                                                <option value="{{$kendaraan->id}}">{{$kendaraan->name ." milik ". $kendaraan->pemilik->user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('kendaraan_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="users_id">Select Penyewa</label>
                                    <select class="choices form-select @error('users_id') is-invalid @enderror"
                                            name="users_id" id="users_id" required>
                                        @if(!old('users_id'))
                                            <option value="" disabled selected>Select Pemilik</option>
                                        @endif
                                        @foreach($users as $user)
                                            @if(old('users_id') == $user->id)
                                                <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                            @else
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('users_id')
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
