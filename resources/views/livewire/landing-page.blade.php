{{--<div>--}}
{{--    <div class="row flex-nowrap">--}}
{{--        <div class="col-auto col-md-4 col-xl-3 px-sm-2 px-0">--}}
{{--            <div class=" flex-column  align-items-sm-start px-3 pt-2 min-vh-100">--}}
{{--                <p class="d-flex justify-content-center align-items-center">--}}
{{--                    <span class="fs-5 d-none d-sm-inline">Daftar Tipe Kendaraan</span>--}}
{{--                </p>--}}
{{--                <div class="form-group position-relative has-icon-right">--}}
{{--                    <input type="text" class="form-control rounded" wire:model.live="search"--}}
{{--                        placeholder="Search Here...">--}}
{{--                    <div class="form-control-icon">--}}
{{--                        <i class="bi bi-search"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"--}}
{{--                    id="menu">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" wire:click.prevent="clearFilter()" class="nav-link px-0">--}}
{{--                            <span class="ms-1 d-none d-sm-inline">All</span></a>--}}
{{--                    </li>--}}
{{--                    @foreach ($tipeKendaraans as $typeKendaraan)--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link px-0"--}}
{{--                                wire:click.prevent="filterByType({{ $typeKendaraan->id }})">--}}
{{--                                <span class="ms-1 d-none d-sm-inline">{{ $typeKendaraan->name }}</span></a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col py-3">--}}
{{--            <main>--}}
{{--                <div class="container">--}}
{{--                    <div class="d-flex flex-wrap mx-auto gap-4">--}}
{{--                        <div class="" wire:loading>--}}
{{--                            Loading Data...--}}
{{--                        </div>--}}
{{--                        @foreach ($kendaraans as $Kendaraan)--}}
{{--                            <div class="card card p-2 bg-white shadow-sm position-relative" style="width: 216px ">--}}
{{--                                <img src="{{ $Kendaraan->image ? asset('images/kendaraan/' . $Kendaraan->image) : 'https://electricvehiclecouncil.com.au/wp-content/uploads/2023/02/4-1002x1024.png' }}"--}}
{{--                                    alt="" class="card-img-top rounded-2" style="width: 200px; height: 200px">--}}

{{--                                <div class="card-body px-1 py-3 position-relative">--}}
{{--                                    <h5 class="card-title">{{ $Kendaraan->name }}</h5>--}}
{{--                                    <p class="card-text">{{ $Kendaraan->formatHarga }}</p>--}}
{{--                                    <a href="{{ route('order.show', $Kendaraan->id) }}"--}}
{{--                                        class=" position-absolute rounded-5 d-flex justify-content-center align-items-center hover"--}}
{{--                                        style="width: 66px; height: 66px; border-width: 8px; border-style: solid; border-color:#f2f7ff; right: -15px; bottom: -15px; transition: background-color 0.3s ease"--}}
{{--                                        onmouseover="this.style.backgroundColor='#c8d6e5';"--}}
{{--                                        onmouseout="this.style.backgroundColor='';">--}}
{{--                                        <span><i class="bi bi-clipboard-plus-fill" style="font-size: 25px;"></i></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </main>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div>
    <div id="sidebar">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo text-sm">
                        <a href="{{route('landingpage')}}">Sewa DiKita</a>
                    </div>
                    <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             aria-hidden="true"
                             role="img" class="iconify iconify--system-uicons" width="20" height="20"
                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                               stroke-linejoin="round">
                                <path
                                    d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                    opacity=".3"></path>
                                <g transform="translate(-210 -1)">
                                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                    <circle cx="220.5" cy="11.5" r="4"></circle>
                                    <path
                                        d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                </g>
                            </g>
                        </svg>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                   style="cursor: pointer">
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg"
                             aria-hidden="true"
                             role="img" class="iconify iconify--mdi" width="20" height="20"
                             preserveAspectRatio="xMidYMid meet"
                             viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                            </path>
                        </svg>
                    </div>
                    <div class="sidebar-toggler  x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title text-center">Products</li>
                    <hr>
                    {{--               search--}}
                    <div class="form-group
                position-relative has-icon-right">
                        <input type="text"
                               class="form-control rounded"
                               wire:model.live="search"
                               placeholder="Search Here...">
                        <div class="form-control-icon">
                            <i class="bi bi-search"></i>
                        </div>
                    </div>
                    <li
                        class="sidebar-item @if($tipeKendaraan == null) active @endif">
                        <a href="#" class='sidebar-link' wire:click.prevent="clearFilter()">
                            <span>All</span>
                        </a>
                    </li>
                    @foreach ($tipeKendaraans as $typeKendaraan)
                        <li class="sidebar-item @if($tipeKendaraan == $typeKendaraan->id) active @endif">
                            <a href="#" class="sidebar-link"
                               wire:click.prevent="filterByType({{ $typeKendaraan->id }})">
                                <span class="ms-1 d-none d-sm-inline">{{ $typeKendaraan->name }}</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div id="main" class='layout-navbar navbar-fixed'>
        <header>
            <nav class="navbar navbar-expand navbar-light navbar-top">
                <div class="container-fluid">
                    <a href="#" class="burger-btn d-block">
                        <i class="bi bi-justify fs-3"></i>
                    </a>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <a class="px-4" href="{{route('landingpage')}}"><span class="h2">Sewa Dikita</span></a>

                        @if(Auth::guest())
                            <div>
                                <a href="{{route('login')}}">
                                    <button type="button" class="btn btn-light">Log In</button>
                                </a>
                                <a href="{{route('register')}}">
                                    <button type="button" class="btn btn-dark">Sign Up</button>
                                </a>
                            </div>
                        @else
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{auth()->user()->name}}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{auth()->user()->role}}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{asset('/assets/static/images/faces/1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{auth()->user()->name}}!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{route('logout')}}" method="post">@csrf
                                            <button class="dropdown-item" type="submit">
                                                <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
        </header>
        <div id="main-content">
            <main class="container">
                <div class="d-flex flex-wrap gap-4 justify-content-center py-4">
                    @foreach($kendaraans as $Kendaraan)
                        <div class="card card p-2 bg-white shadow-sm position-relative" style="width: 216px ">
                            <img
                                src="{{ $Kendaraan->image ? asset('images/kendaraan/' . $Kendaraan->image) : 'https://electricvehiclecouncil.com.au/wp-content/uploads/2023/02/4-1002x1024.png' }}"
                                alt="foto{{$Kendaraan->name}}" class="card-img-top rounded-2" style="width: 200px; height: 200px">
                            <div class="card-body px-1 py-3 position-relative">
                                <h5 class="card-title">{{ $Kendaraan->name }}</h5>
                                <p class="card-text">Rp{{ $Kendaraan->harga }}</p>
                                <a href="{{route('order.show',$Kendaraan->id )}}"
                                   class=" position-absolute rounded-5 d-flex justify-content-center align-items-center
                                   hover"
                                   style="width: 66px; height: 66px; border-width: 8px; border-style: solid; border-color:
                                #f2f7ff; right: -15px; bottom: -15px; transition: background-color 0.3s ease"
                                   onmouseover="this.style.backgroundColor='#c8d6e5';"
                                   onmouseout="this.style.backgroundColor='';">
                                    <span><i class="bi bi-clipboard-plus-fill" style="font-size: 25px;"></i></span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
</div>
