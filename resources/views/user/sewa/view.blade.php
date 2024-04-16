@extends('layouts.dashboard.master')
@section('content')
    <div class="page-heading">
        <h3>Detail Sewa</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-6">
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
                
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Pembayaran </h4>
                    </div>
                    <div class="card-body">
                        <p>Click Item Below to see data pembayaran</p>
                        <div class="accordion" id="accordionPembayaran">
                            @foreach($pembayarans as $pembayaran)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{$loop->iteration}}">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{$loop->iteration}}" aria-expanded="false"
                                                aria-controls="collapse{{$loop->iteration}}">
                                            Data Pembayaran
                                        </button>
                                    </h2>
                                    <div id="collapse{{$loop->iteration}}" class="accordion-collapse collapse"
                                         aria-labelledby="heading{{$loop->iteration}}"
                                         data-bs-parent="#accordionPembayaran" style="">
                                        <div class="accordion-body">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td>Pembayaran Via</td>
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
                                                    <td>Status Pembayaran</td>
                                                    <td>{{$pembayaran->status_pembayaran}}</td>
                                                </tr>
                                               
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                    <a href="{{route('order.index')}}" class=" col-1 btn btn-primary icon btn-sm">Back</a>
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
