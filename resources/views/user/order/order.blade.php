@extends('layouts.orderLayout')
@section('content')
    <div class="page-heading text-center">
        <h3>Order detail {{$order->name}}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-img ratio ratio-1x1">
                        <img src="{{asset('/images/texzture 1.png')}}" alt="texzture 1" width="100%" height="100%"
                             class="p-1 p-sm-3 rounded-3">
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card ">
                    <div class="card-body ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nama Kendaraan</label>
                                <input type="text" id="name"
                                       class="form-control round"
                                       name="name" value="{{old('name',$order->name)}}" disabled readonly>

                                <label for="merk">Merk Kendaraan</label>
                                <input type="text" id="merk"
                                       class="form-control round"
                                       name="merk" value="{{old('merk',$order->merk)}}" disabled readonly>

                                <label for="plat_nomor">Plat Nomor Kendaraan</label>
                                <input type="text" id="plat_nomor"
                                       class="form-control round"
                                       name="plat_nomor" value="{{old('plat_nomor',$order->plat_nomor)}}" disabled
                                       readonly>

                                <label for="harga">Harga</label>
                                <input type="number" id="harga"
                                       class="form-control round"
                                       name="harga" value="{{old('harga',$order->harga)}}" disabled readonly>
                                <label for="warna">Warna Kendaraan</label>
                                <input type="text" id="warna"
                                       class="form-control round"
                                       name="warna" value="{{old('warna',$order->warna)}}" disabled readonly>

                                <label for="kondisi">Kondisi Kendaraan</label>
                                <input type="text" id="kondisi"
                                       class="form-control round"
                                       name="kondisi" value="{{old('kondisi',$order->kondisi)}}" disabled readonly>

                                <label for="tipe_kendaraan_id">Tipe Kendaraan</label>
                                <input type="text" id="tipe_kendaraan_id" class="form-control round"
                                       name="tipe_kendaraan_name" value="{{$order->tipe_kendaraan->name}}" disabled
                                       readonly>

                                <label for="pemilik_id">Pemilik</label>
                                <input type="text" id="pemilik_id"
                                       class="form-control round"
                                       name="pemilik_id" value="{{$order->pemilik->user->name}}" disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body ">
                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="tanggal_sewa">Tanggal Sewa</label>
                                <input type="date" id="tanggal_sewa"
                                       class="form-control round @error($errors->first('tanggal_sewa')) is-invalid @enderror"
                                       name="tanggal_sewa" value="{{ old('tanggal_sewa') }}" required>
                                @error('tanggal_sewa')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_perkiraan_kembali">Tanggal Akhir Sewa</label>
                                <input type="date" id="tanggal_perkiraan_kembali"
                                       class="form-control round @error('tanggal_perkiraan_kembali') is-invalid @enderror"
                                       name="tanggal_perkiraan_kembali" value="{{ old('tanggal_perkiraan_kembali') }}"
                                       required>
                                @error('tanggal_perkiraan_kembali')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Price</label>
                                <input type="text" id="total_harga"
                                       class="form-control"
                                       placeholder="Total Price"
                                       name="total_harga" value="{{ old('total_harga') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kendaraan_id">Select Kendaraan</label>
                                <input class="form-control round @error('kendaraan_id') is-invalid @enderror"
                                       name="kendaraan_id" id="kendaraan_id"
                                       value="{{ old('kendaraan_id', $order->id) }}"
                                       required>

                                @error('kendaraan_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
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
    <script>
        document.getElementById('tanggal_perkiraan_kembali').addEventListener('change', function () {
            var tanggal_sewa = new Date(document.getElementById('tanggal_sewa').value);
            var tanggal_perkiraan_kembali = new Date(this.value);

            var diffTime = Math.abs(tanggal_perkiraan_kembali - tanggal_sewa);
            var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            if (tanggal_perkiraan_kembali < tanggal_sewa) {
                var oneDayAfterSewa = new Date(tanggal_sewa.getTime() + (24 * 60 * 60 * 1000)); // Menambahkan satu hari
                this.value = oneDayAfterSewa.toISOString().split('T')[0];
                diffDays = 1;
                document.getElementById('total_harga').value = diffDays * {{$order->harga}};
            } else {
                document.getElementById('total_harga').value = diffDays * {{$order->harga}};
            }
        });
    </script>
@endsection
