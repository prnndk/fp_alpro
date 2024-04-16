@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Data Pembayaran Sewa</h3>
        {{--        {{Breadcrumbs::render('userCreate')}}--}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Transaksi Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table
                                class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Bukti Pembayaran</td>
                                    <td><img class="img-fluid" src="{{asset('/images/bukti_pembayaran/'.$pembayaran->bukti_pembayaran)}}"></td>
                                </tr>
                                <tr>
                                    <td>Pembayaran Melalui</td>
                                    <td>{{$pembayaran->pembayaran_via}}</td>
                                </tr>
                                <tr>
                                    <td>Tipe Pembayaran</td>
                                    <td>{{$pembayaran->type_pembayaran}}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Dibayarkan</td>
                                    <td>{{$pembayaran->jumlah_dibayarkan}}</td>
                                </tr>
                                <tr>
                                    <td>Data Kendaraan Sewa</td>
                                    <td>
                                        <ul>
                                            <li>Kendaraan: {{$pembayaran->sewa->kendaraan->name}}</li>
                                            <li>Disewa Oleh: {{$pembayaran->sewa->user->name}}</li>
                                            <li>Tanggal Sewa: {{$pembayaran->sewa->tanggal_sewa->format('d-m-Y')}}</li>
                                            <li>Tanggal Perkiraan Akhir: {{$pembayaran->sewa->tanggal_perkiraan_kembali->format('d-m-Y')}}</li>
                                            <li>Total Harga: {{$pembayaran->sewa->formatRupiah}}</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td>{{$pembayaran->status_pembayaran}}</td>
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
{{--                        <a href="{{route('admin.pembayaran.verify',$pembayaran->uuid)}}" class="btn icon icon-left btn-primary"><i class="bi bi-patch-question-fill"></i> Verify</a>--}}
                        <a href="{{route('admin.pembayaran.edit',$pembayaran->uuid)}}" class="btn icon icon-left btn-warning"><i class="bi bi-pencil"></i> Edit Data</a>
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
