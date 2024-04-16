@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Buat data pembayaran Baru</h3>
                {{Breadcrumbs::render('pembayaranCreate')}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Pembayaran Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{route('admin.pembayaran.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="pembayaran_via">Pembayaran Melalui</label>
                                    <input type="text" id="pembayaran_via"
                                           class="form-control round @error('pembayaran_via') is-invalid @enderror"
                                           name="pembayaran_via" value="{{old('pembayaran_via')}}" required maxlength="40">
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
                                            <option value="" disabled selected>Select Tipe Kendaraan</option>
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
                                <div class="form-group">
                                    <label for="status_pembayaran">Select Status Pembayaran</label>
                                    <select class="choices form-select @error('status_pembayaran') is-invalid @enderror"
                                            name="status_pembayaran" id="status_pembayaran" required>
                                        @if(!old('status_pembayaran'))
                                            <option value="" disabled selected>Select Tipe Kendaraan</option>
                                        @endif
                                        @foreach($status_pembayarans as $status_pembayaran)
                                            @if(old('status_pembayaran') == $status_pembayaran->value)
                                                <option value="{{$status_pembayaran->value}}"
                                                        selected>{{$status_pembayaran->value}}</option>
                                            @else
                                                <option
                                                    value="{{$status_pembayaran->value}}">{{$status_pembayaran->value}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('status_pembayaran')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sewa_id">Select Transaksi Sewa</label>
                                    <select class="choices form-select @error('sewa_id') is-invalid @enderror"
                                            name="sewa_id" id="sewa_id" required>
                                        @if(!old('sewa_id'))
                                            <option value="" disabled selected>Select Transaksi Sewa</option>
                                        @endif
                                        @foreach($sewas as $sewa)
                                            @if(old('sewa_id') == $sewa->id)
                                                <option value="{{$sewa->id}}"
                                                        selected>{{$sewa->kendaraan->name}}</option>
                                            @else
                                                <option
                                                    value="{{$sewa->id}}">{{$sewa->kendaraan->name . "/".$sewa->tanggal_sewa->format('d-m-Y')."/".$sewa->user->name}}</option>
                                            @endif
                                        @endforeach
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
        </section>
    </div>
@endsection
@section('styles')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
    />
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet"/>
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    @vite('resources/js/pages/form-element-select.js')
    @vite('resources/js/pages/filepond.js')
@endsection
