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

                    </div>
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
