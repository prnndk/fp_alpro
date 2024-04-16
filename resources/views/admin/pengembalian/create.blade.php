@extends('layouts.dashboard.master')
@section('content')

    <div class="page-heading">
        <h3>Pengembalian Kendaraan Sewa</h3>
                {{Breadcrumbs::render('pengembalianCreate')}}
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Pengembalian Sewa</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{route('admin.pengembalian.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="tanggal_kembali">Tanggal Kembali</label>
                                    <input type="date" id="tanggal_kembali"
                                           class="form-control round @error('tanggal_kembali') is-invalid @enderror"
                                           name="tanggal_kembali" value="{{old('tanggal_kembali')}}" required>
                                    @error('tanggal_kembali')
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
                                    <label for="denda">Denda</label>
                                    <input type="number" id="denda"
                                           class="form-control round @error('denda') is-invalid @enderror"
                                           name="denda" value="{{old('denda')}}">
                                    @error('denda')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kondisi">Kondisi Kendaraan</label>
                                    <input type="text" id="kondisi"
                                           class="form-control round @error('kondisi') is-invalid @enderror"
                                           name="kondisi" value="{{old('kondisi')}}" required>
                                    @error('kondisi')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
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
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    @vite('resources/js/pages/form-element-select.js')
@endsection
