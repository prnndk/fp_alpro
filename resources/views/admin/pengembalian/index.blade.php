@extends('layouts.dashboard.master')
@section('content')
    <div class="page-heading">
        <h3>Data Pengembalian Kendaraan</h3>
        {{\Diglactic\Breadcrumbs\Breadcrumbs::render('pelanggan')}}
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
                                        <h6 class="text-muted font-semibold">User Pelanggan Count</h6>
                                        <h6 class="font-extrabold mb-0">{{App\Models\User::where('role',\App\Enums\RolesType::USER->value)->count()}}</h6>
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
                                        <h6 class="text-muted font-semibold">Pelanggan Filled Data Count</h6>
                                        <h6 class="font-extrabold mb-0">{{App\Models\Pelanggan::count()}}</h6>
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
                                <h4>Data Kendaraan Kembali</h4>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{route('admin.pengembalian.create')}}" class="btn btn-primary icon icon-left btn-sm">
                                    <i class="bi bi-person-plus-fill"></i> Create New
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Kondisi</th>
                                <th>Denda</th>
                                <th>Terlambat</th>
                                <th>Tanggal Kembali</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pengembalians as $pengembalian)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$pengembalian->kondisi}}</td>
                                    <td>{{$pengembalian->denda}}</td>
                                    <td>{{$pengembalian->is_telat}}</td>
                                    <td>{{$pengembalian->tanggal_kembali}}</td>
                                    <td>
                                        <a href="{{route('admin.kendaraan.show',$pengembalian->id)}}" class="btn btn-primary icon btn-sm"><i class="bi bi-eye"></i></a>
                                        <a href="{{route('admin.kendaraan.edit',$pengembalian->id)}}" class="btn btn-warning icon btn-sm"><i class="bi bi-pencil"></i></a>
                                        <a href="{{ route('admin.kendaraan.destroy', $pengembalian->id) }}"
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
