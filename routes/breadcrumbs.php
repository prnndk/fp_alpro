<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
});
Breadcrumbs::for('userCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Create', route('users.create'));
});
Breadcrumbs::for('userEdit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users');
    $trail->push('Edit', route('users.edit', $user));
});
Breadcrumbs::for('userShow', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users');
    $trail->push('Show', route('users.show', $user));
});

Breadcrumbs::for('pelanggan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pelanggan', route('pelanggan.index'));
});
Breadcrumbs::for('pelangganDetail', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('pelanggan');
    $trail->push($user->user->name, route('pelanggan.show', $user->id));
});
Breadcrumbs::for('pelangganEdit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('pelangganDetail', $user);
    $trail->push('Edit', route('pelanggan.edit', $user));
});

Breadcrumbs::for('kendaraan', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kendaraan', route('admin.kendaraan.index'));
});
Breadcrumbs::for('kendaraanCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('kendaraan');
    $trail->push('Create', route('admin.kendaraan.create'));
});
Breadcrumbs::for('kendaraanEdit', function (BreadcrumbTrail $trail, $kendaraan) {
    $trail->parent('kendaraan');
    $trail->push('Edit', route('admin.kendaraan.edit', $kendaraan->id));
});
Breadcrumbs::for('kendaraanShow', function (BreadcrumbTrail $trail, $kendaraan) {
    $trail->parent('kendaraan');
    $trail->push('Show', route('admin.kendaraan.show',  $kendaraan->id));
});
Breadcrumbs::for('pembayaran', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pembayaran', route('admin.pembayaran.index'));
});
Breadcrumbs::for('pembayaranDetail', function (BreadcrumbTrail $trail, $pembayaran) {
    $trail->parent('pembayaran');
    $trail->push('Detail', route('admin.pembayaran.show', $pembayaran->id));
});
Breadcrumbs::for('pembayaranEdit', function (BreadcrumbTrail $trail, $pembayaran) {
    $trail->parent('pembayaran');
    $trail->push('Edit', route('admin.pembayaran.edit', $pembayaran->id));
});
Breadcrumbs::for('pembayaranCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('pembayaran');
    $trail->push('Create', route('admin.pembayaran.create'));
});
Breadcrumbs::for('pemilik', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pemilik', route('pemilik.index'));
});
Breadcrumbs::for('pemilikDetail', function (BreadcrumbTrail $trail, $pemilik) {
    $trail->parent('pemilik');
    $trail->push('Detail', route('pemilik.show', $pemilik->id));
});
Breadcrumbs::for('pemilikEdit', function (BreadcrumbTrail $trail, $pemilik) {
    $trail->parent('pemilik');
    $trail->push('Edit', route('pemilik.edit', $pemilik->id));
});
Breadcrumbs::for('pemilikCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('pemilik');
    $trail->push('Create', route('pemilik.create'));
});
Breadcrumbs::for('pengembalian', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Pengembalian', route('admin.pengembalian.index'));
});
Breadcrumbs::for('pengembalianDetail', function (BreadcrumbTrail $trail, $pengembalian) {
    $trail->parent('pengembalian');
    $trail->push('Detail', route('admin.pengembalian.show', $pengembalian->id));
});
Breadcrumbs::for('pengembalianCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('pengembalian');
    $trail->push('Create', route('admin.pengembalian.create'));
});
Breadcrumbs::for('kendaraanOwner', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kendaraan', route('owner.kendaraan.index'));
});
Breadcrumbs::for('kendaraanOwnerCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('kendaraanOwner');
    $trail->push('Create', route('owner.kendaraan.create'));
});
Breadcrumbs::for('kendaraanOwnerEdit', function (BreadcrumbTrail $trail, $kendaraan) {
    $trail->parent('kendaraanOwner');
    $trail->push('Edit', route('owner.kendaraan.edit', $kendaraan->id));
});
Breadcrumbs::for('kendaraanOwnerShow', function (BreadcrumbTrail $trail, $kendaraan) {
    $trail->parent('kendaraanOwner');
    $trail->push('Show', route('owner.kendaraan.show',  $kendaraan->id));
});
Breadcrumbs::for('sewaOwner', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Sewa', route('owner.sewa.index'));
});
Breadcrumbs::for('sewaOwnerShow', function (BreadcrumbTrail $trail, $sewa) {
    $trail->parent('sewaOwner');
    $trail->push('View', route('owner.sewa.show', $sewa->uuid));
});
Breadcrumbs::for('pengembalianOwner', function (BreadcrumbTrail $trail, $sewa) {
    $trail->parent('sewaOwnerShow', $sewa);
    $trail->push('Pengembalian', route('owner.pengembalian.create', $sewa->uuid));
});


// User
Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('admin.sewa.index'));
});


//SEWA
Breadcrumbs::for('sewa', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Sewa', route('users.index'));
});
Breadcrumbs::for('sewaDetail', function (BreadcrumbTrail $trail, $sewa) {
    $trail->parent('sewa');
    $trail->push('Detail', route('admin.sewa.show', $sewa->uuid ));
});

Breadcrumbs::for('sewaEdit', function (BreadcrumbTrail $trail, $sewa) {
    $trail->parent('sewa', $sewa);
    $trail->push('Edit', route('admin.sewa.edit', $sewa));
});


//tipe Kendaraan
Breadcrumbs::for('tipe', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tipe Kendaraan', route('tipe_kendaraan.index'));
});
Breadcrumbs::for('tipeDetail', function (BreadcrumbTrail $trail, $tipeKendaraan) {
    $trail->parent('tipe');
    $trail->push('Detail', route('tipe_kendaraan.show', $tipeKendaraan->id));
});

Breadcrumbs::for('tipeEdit', function (BreadcrumbTrail $trail, $tipeKendaraan) {
    $trail->parent('tipe', $tipeKendaraan);
    $trail->push('Edit', route('tipe_kendaraan.edit', $tipeKendaraan));
});