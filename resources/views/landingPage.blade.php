<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    @vite(['resources/scss/app.scss' ,'resources/scss/themes/dark/app-dark.scss'])
    {{-- CSS --}}
    {{-- @stack('CSS') --}}

    {{-- JS --}}
    {{-- @stack('JS') --}}
</head>

<body>
<nav class="navbar sticky-top navbar-light justify-content-between"
     style="background-color: #f2f7ff; padding-left: 112px; padding-right: 112px; padding-top: 12px; padding-bottom: 12px  ">
    <div class="container-fluid">
        <a class="navbar-brand " href="/">
            <img src="{{asset('/images/logo.png')}}" alt="logo" width="30" height="24">
        </a>
        <span class="navbar-brand mb-0 h1">Sewa Dikita</span>
        <div>
            <button type="button" class="btn btn-light">Log In</button>
            <button type="button" class="btn btn-dark">Sign Up</button>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
            <div class=" flex-column  align-items-sm-start px-3 pt-2 min-vh-100">
                <p class="d-flex justify-content-center align-items-center">
                    <span class="fs-5 d-none d-sm-inline">Products</span>
                </p>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-0">
                            <span class="ms-1 d-none d-sm-inline">All</span></a>
                    </li>
                    @foreach($tipeKendaraans as $typeKendaraan)
                        <li class="nav-item">
                            <a href="#" class="nav-link px-0">
                                <span class="ms-1 d-none d-sm-inline">{{ $typeKendaraan->name }}</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col py-3">
            <main>
                <div class="container">
                    <div class="d-flex flex-wrap mx-auto gap-4">
                        @foreach($kendaraans as $Kendaraan)

                            <div class="card p-2 bg-white shadow-sm position-relative" style="width: 246px ">
                                <img
                                    src=""
                                    alt=""
                                    class="card-img-top rounded-2"
                                    style="width: 230px; height: 230px">

                                <div class="card-body px-1 py-3 position-relative">
                                    <h5 class="card-title">{{ $Kendaraan->name }}</h5>
                                    <p class="card-text">Rp{{ $Kendaraan->harga }}</p>
                                    <a href=""
                                       class="position-absolute rounded-5 d-flex justify-content-center align-items-center"
                                       style="width: 66px; height: 66px; border-width: 8px; border-style: solid; border-color: #f2f7ff; right: -15px; bottom: -15px; transition: background-color 0.3s ease"
                                       onmouseover="this.style.backgroundColor='#c8d6e5';"
                                       onmouseout="this.style.backgroundColor='';">
                                        <span>+</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
</body>

</html>
