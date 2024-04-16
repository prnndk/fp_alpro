<div>
    <div class="row flex-nowrap">
        <div class="col-auto col-md-4 col-xl-3 px-sm-2 px-0">
            <div class=" flex-column  align-items-sm-start px-3 pt-2 min-vh-100">
                <p class="d-flex justify-content-center align-items-center">
                    <span class="fs-5 d-none d-sm-inline">Daftar Tipe Kendaraan</span>
                </p>
                <div class="form-group position-relative has-icon-right">
                    <input type="text" class="form-control rounded" wire:model.live="search"
                        placeholder="Search Here...">
                    <div class="form-control-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                    id="menu">
                    <li class="nav-item">
                        <a href="#" wire:click.prevent="clearFilter()" class="nav-link px-0">
                            <span class="ms-1 d-none d-sm-inline">All</span></a>
                    </li>
                    @foreach ($tipeKendaraans as $typeKendaraan)
                        <li class="nav-item">
                            <a href="#" class="nav-link px-0"
                                wire:click.prevent="filterByType({{ $typeKendaraan->id }})">
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
                        <div class="" wire:loading>
                            Loading Data...
                        </div>
                        @foreach ($kendaraans as $Kendaraan)
                            <div class="card card p-2 bg-white shadow-sm position-relative" style="width: 216px ">
                                <img src="{{ $Kendaraan->image ? asset('images/kendaraan/' . $Kendaraan->image) : 'https://electricvehiclecouncil.com.au/wp-content/uploads/2023/02/4-1002x1024.png' }}"
                                    alt="" class="card-img-top rounded-2" style="width: 200px; height: 200px">

                                <div class="card-body px-1 py-3 position-relative">
                                    <h5 class="card-title">{{ $Kendaraan->name }}</h5>
                                    <p class="card-text">{{ $Kendaraan->formatHarga }}</p>
                                    <a href="{{ route('order.show', $Kendaraan->id) }}"
                                        class=" position-absolute rounded-5 d-flex justify-content-center align-items-center hover"
                                        style="width: 66px; height: 66px; border-width: 8px; border-style: solid; border-color:#f2f7ff; right: -15px; bottom: -15px; transition: background-color 0.3s ease"
                                        onmouseover="this.style.backgroundColor='#c8d6e5';"
                                        onmouseout="this.style.backgroundColor='';">
                                        <span><i class="bi bi-clipboard-plus-fill" style="font-size: 25px;"></i></span>
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
