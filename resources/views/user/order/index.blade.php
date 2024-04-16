@extends('layouts.dashboard.master')
@section('content')
    <div class="page-heading">
        <h3>User Order</h3>
        {{\Diglactic\Breadcrumbs\Breadcrumbs::render('user')}}
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
                                        <h6 class="text-muted font-semibold">Jumlah Transaksi Sewa</h6>
                                        <h6 class="font-extrabold mb-0">{{ App\Models\Sewa::where('users_id', auth()->id())->count() }}
                                        </h6>
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
                                        <h6 class="font-extrabold mb-0">{{ \App\Models\Sewa::where('status_sewa', \App\Enums\StatusSewaType::SELESAI)->where('users_id', auth()->id())->count() }}
                                        </h6>
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
                                <h4>Data sewa oleh {{ auth()->user()->name }}</h4>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{route('landingpage')}}" class="btn btn-primary icon icon-left btn-sm">
                                    <i class="bi bi-person-plus-fill"></i> Buat Sewa Baru
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Kendaraan</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Kembali</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sewas as $sewa)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$sewa->kendaraan->name}}</td>
                                    <td>{{$sewa->tanggal_sewa->format('d/m/Y')}}</td>
                                    <td>{{$sewa->tanggal_sewa->format('d/m/Y')}}</td>
                                    <td>{{\App\Models\Sewa::formatToRupiah($sewa->total_harga)}}</td>
                                    <td>{{$sewa->status_sewa}}</td>
                                    <td>
                                        <a href="{{route('sewa.show',$sewa->id)}}"
                                           class="btn btn-primary icon btn-sm"><i class="bi bi-eye"></i></a>
                                        @if($sewa->status_sewa == \App\Enums\StatusSewaType::MENUNGGU)
                                            <a href="{{ route('admin.sewa.edit', $sewa->id) }}"
                                               class="btn btn-warning icon btn-sm">Bayar</a>
                                        @endif


                                        {{--                                        <a href="{{ route('admin.sewa.destroy', $sewa->id) }}"--}}
                                        {{--                                           class="btn btn-danger btn-sm icon" data-confirm-delete="true"><i--}}
                                        {{--                                                class="bi bi-trash"></i></a>--}}
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
