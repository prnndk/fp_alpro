@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Data Sewa Kendaraan</h3>
        {{Breadcrumbs::render('sewaDetail',$sewa)}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Sewa </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table
                                class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Tanggal Sewa</td>
                                    <td>{{$sewa->tanggal_sewa->format('d/m/Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Perkiraan Kembali</td>
                                    <td>{{$sewa->tanggal_perkiraan_kembali->format('d/m/Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Status Sewa</td>
                                    <td>{{$sewa->status_sewa}}</td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td>{{\App\Models\Sewa::formatToRupiah($sewa->total_harga)}}</td>
                                </tr>
                                <tr>
                                    <td>Disewa Oleh</td>
                                    <td>{{$sewa->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Kendaraan Sewa</td>
                                    <td>{{$sewa->kendaraan->name}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Action</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{route('admin.sewa.verify',$sewa->uuid)}}" class="btn icon icon-left btn-primary"><i class="bi bi-patch-question-fill"></i> Verify</a>
                        <a href="{{route('admin.sewa.edit',$sewa->uuid)}}" class="btn icon icon-left btn-warning"><i class="bi bi-pencil"></i> Edit Data</a>
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
