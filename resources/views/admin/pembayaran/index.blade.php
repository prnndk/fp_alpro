@extends('layouts.dashboard.master')
@section('content')
    <div class="page-heading">
        <h3>Data Pembayaran</h3>
                {{\Diglactic\Breadcrumbs\Breadcrumbs::render('pembayaran')}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Jumlah Pembayaran Masuk</h6>
                                        <h6 class="font-extrabold mb-0">{{App\Models\Pembayaran::count()}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Jumlah Sewa Selesai</h6>
                                        <h6 class="font-extrabold mb-0">{{\App\Models\Sewa::where('status_sewa',\App\Enums\StatusSewaType::SELESAI)->count()}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Jumlah Sewa Selesai</h6>
                                        <h6 class="font-extrabold mb-0"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Data Pembayaran Sewa</h4>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{route('admin.pembayaran.create')}}" class="btn icon icon-left btn-primary btn-sm">
                                    <i class="bi bi-plus"></i> Buat Pembayaran
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
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
                                        <a href="{{ route('admin.pembayaran.destroy', $pembayaran->uuid) }}"
                                           class="btn btn-danger btn-sm icon" data-confirm-delete="true"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    @vite('resources/scss/pages/simple-datatables.scss')
@endsection
@section('scripts')
    <script src="{{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}}"></script>
    @vite('resources/js/pages/simple-datatables.js')
@endsection
