@extends('layouts.dashboard.master')
@section('content')
    <div class="page-heading">
        <h3>Application Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Jumlah Transaksi</h6>
                                        <h6 class="font-extrabold mb-0">{{\App\Models\Sewa::count()}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Jumlah Kendaraan</h6>
                                        <h6 class="font-extrabold mb-0">{{\App\Models\Kendaraan::count()}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Jumlah Pengguna</h6>
                                        <h6 class="font-extrabold mb-0">{{\App\Models\User::where('role','!=',\App\Enums\RolesType::ADMIN)->count()}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Pemasukan</h6>
                                        <h6 class="font-extrabold mb-0">{{$totalPembayaran}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Sewa belum diverifikasi</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Sewa </th>
                                        <th>Kendaraan</th>
                                        <th>Penyewa</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sewas as $sewa)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$sewa->tanggal_sewa->format('d/m/Y')}}</td>
                                            <td>{{$sewa->kendaraan->name}}</td>
                                            <td>{{$sewa->user->name}}</td>
                                            <td>{{$sewa->formatRupiah}}</td>
                                            <td>{{$sewa->status_sewa}}</td>
                                            <td>
                                                <a href="{{route('admin.sewa.show',$sewa->uuid)}}" class="btn btn-primary icon btn-sm"><i class="bi bi-eye"></i></a>
                                                <a href="{{route('admin.sewa.verify',$sewa->uuid)}}" class="btn btn-warning icon btn-sm"><i class="bi bi-pencil"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pembayaran belum diverifikasi</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table2">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pembayaran Via</th>
                                        <th>Tipe Pembayaran</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Status Pembayaran</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pembayarans as $pembayaran)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$pembayaran->pembayaran_via}}</td>
                                            <td>{{$pembayaran->type_pembayaran}}</td>
                                            <td>{{$pembayaran->jumlah_dibayarkan}}</td>
                                            <td>{{$pembayaran->status_pembayaran}}</td>
                                            <td>
                                                <a href="{{route('admin.pembayaran.show',$pembayaran->uuid)}}" class="btn btn-primary icon btn-sm"><i class="bi bi-eye"></i></a>
                                                <a href="{{route('admin.pembayaran.edit',$pembayaran->uuid)}}" class="btn btn-warning icon btn-sm"><i class="bi bi-pencil"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="assets/static/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{auth()->user()->name}}</h5>
                                <h6 class="text-muted mb-0">{{auth()->user()->role}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('styles')
    @vite('resources/scss/iconly.scss')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    @vite('resources/scss/pages/simple-datatables.scss')
@endsection
@section('scripts')
    <script src="{{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}}"></script>
    @vite('resources/js/pages/simple-datatables.js')
    @vite('resources/js/pages/dashboard.js')
@endsection
