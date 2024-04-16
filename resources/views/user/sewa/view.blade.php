@extends('layouts.dashboard.master')
@section('content')
    <div class="page-heading">
        <h3>Detail Sewa</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Sewa Detail</h4>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Nama Kendaraan</td>
                                        <td>{{$sewa->kendaraan->name}}</td>
                                    </tr>
                                <tr>
                                    <td>Tanggal Sewa</td>
                                    <td>{{$sewa->tanggal_sewa->format('d/m/Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Perkiraan Kembali</td>
                                    <td>{{$sewa->tanggal_perkiraan_kembali->format('d/m/Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td>{{\App\Models\Sewa::formatToRupiah($sewa->total_harga)}}</td>
                                </tr>
                                <tr>
                                    <td>Status Sewa</td>
                                    <td>{{$sewa->status_sewa}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{route('order.index')}}" class=" col-1 btn btn-primary icon btn-sm">Back</a>
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
