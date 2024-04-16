@extends('layouts.dashboard.master')
@section('content')
    <div class="page-heading">
        <h3>Pembayaran {{$bayar->kendaraan->name}} oleh {{auth()->user()->name}}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>Tanggal Sewa</td>
                                <td>{{$bayar->tanggal_sewa->format('d/m/Y')}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Perkiraan Kembali</td>
                                <td>{{$bayar->tanggal_perkiraan_kembali->format('d/m/Y')}}</td>
                            </tr>
                            <tr>
                                <td>Total Harga</td>
                                <td>{{$bayar->total_harga}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{route('bayar.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="pembayaran_via">Pembayaran Melalui</label>
                                    <input type="text" id="pembayaran_via"
                                           class="form-control round @error('pembayaran_via') is-invalid @enderror"
                                           name="pembayaran_via" value="{{old('pembayaran_via')}}" required
                                           maxlength="40">
                                    @error('pembayaran_via')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_dibayarkan">Jumlah Bayar</label>
                                    <input type="number" id="jumlah_dibayarkan"
                                           class="form-control round @error('jumlah_dibayarkan') is-invalid @enderror"
                                           name="jumlah_dibayarkan" value="{{old('jumlah_dibayarkan')}}" required>
                                    @error('jumlah_dibayarkan')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type_pembayaran">Select Tipe Pembayaran</label>
                                    <select class="choices form-select @error('type_pembayaran') is-invalid @enderror"
                                            name="type_pembayaran" id="type_pembayaran" required>
                                        @if(!old('type_pembayaran'))
                                            <option value="" disabled selected>Select Tipe Pembayaran</option>
                                        @endif
                                        @foreach($type_pembayarans as $type_pembayaran)
                                            @if(old('type_pembayaran') == $type_pembayaran->value)
                                                <option value="{{$type_pembayaran->value}}"
                                                        selected>{{$type_pembayaran->value}}</option>
                                            @else
                                                <option
                                                    value="{{$type_pembayaran->value}}">{{$type_pembayaran->value}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('type_pembayaran')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group d-none">
                                    <label for="status_pembayaran">Select Status Pembayaran</label>
                                    <select class="choices form-select @error('status_pembayaran') is-invalid @enderror"
                                            name="status_pembayaran" id="status_pembayaran" required>
                                        <option
                                            value="{{ \App\Enums\StatusPembayaranType::MENUNGGU }}">{{ \App\Enums\StatusPembayaranType::MENUNGGU }}</option>
                                    </select>
                                    @error('status_pembayaran')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group d-none">
                                    <label for="sewa_id">Select Transaksi Sewa</label>
                                    <select class="choices form-select @error('sewa_id') is-invalid @enderror"
                                            name="sewa_id" id="sewa_id" required>


                                        <option
                                            value="{{$bayar->id}}">{{$bayar->kendaraan->name . "/".$bayar->tanggal_sewa->format('d-m-Y')."/".$bayar->user->name}}</option>

                                    </select>
                                    @error('sewa_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Upload Bukti Pembayaran</label>
                                    <input type="file" class="image-preview-filepond" name="bukti_pembayaran"
                                           id="bukti_pembayaran">
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
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
