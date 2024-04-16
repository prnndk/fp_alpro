@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Data Pengembalian Sewa</h3>
                {{Breadcrumbs::render('pengembalianDetail', $pengembalian)}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kembali Sewa</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table
                                class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Kondisi Kendaraan</td>
                                    <td>{{$pengembalian->kondisi}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kembali</td>
                                    <td>{{$pengembalian->tanggal_kembali->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Apakah Kembali Telat</td>
                                    <td>{{$pengembalian->is_telat}}</td>
                                </tr>
                                <tr>
                                    <td>Data Kendaraan Sewa</td>
                                    <td>
                                        <ul>
                                            <li>Kendaraan: {{$pengembalian->sewa->kendaraan->name}}</li>
                                            <li>Disewa Oleh: {{$pengembalian->sewa->user->name}}</li>
                                            <li>Tanggal Sewa: {{$pengembalian->sewa->tanggal_sewa->format('d-m-Y')}}</li>
                                            <li>Tanggal Perkiraan Akhir: {{$pengembalian->sewa->tanggal_perkiraan_kembali->format('d-m-Y')}}</li>
                                            <li>Total Harga: {{$pengembalian->sewa->formatRupiah}}</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Denda</td>
                                    <td>{{$pengembalian->formatDenda}}</td>
                                </tr>
                                </tbody>
                            </table>
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
