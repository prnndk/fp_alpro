@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Verifikasi Sewa Kendaraan</h3>
        {{--        {{Breadcrumbs::render('userCreate')}}--}}
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
                                                <tr>
                                                    <td>Detail Data</td>
                                                    <td><a href="{{route('admin.pembayaran.show',$pembayaran->uuid)}}"
                                                           class="btn btn-sm btn-outline-primary">Data Pembayaran</a>
                                                    </td>
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
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Verifikasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.sewa.verify',$sewa->uuid)}}" method="post">
                            @csrf
                            <div class="form-group
                            @error('status_sewa') is-invalid @enderror">
                                <label for="status_sewa">Status Sewa</label>
                                <select class="choices form-select" name="status_sewa" id="status_sewa" required>
                                    @foreach($verifyData as $verify)
                                        @if(old('status_sewa',$sewa->status_sewa) == $verify)
                                            <option value="{{$verify}}" selected>{{$verify}}</option>
                                        @else
                                            <option value="{{$verify}}">{{$verify}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('status_sewa')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rejected_message">Rejected Message</label>
                                <input type="text" id="rejected_message"
                                       class="form-control round @error('rejected_message') is-invalid @enderror"
                                       name="rejected_message" value="{{old('rejected_message',$sewa->rejected_message)}}">
                                @error('rejected_message')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Verification Data</button>
                        </form>
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
