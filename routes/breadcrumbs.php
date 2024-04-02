<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('users',function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
});
Breadcrumbs::for('userCreate',function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Create', route('users.create'));
});
Breadcrumbs::for('userEdit',function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users');
    $trail->push('Edit', route('users.edit', $user));
});
Breadcrumbs::for('userShow',function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users');
    $trail->push('Show', route('users.show', $user));
});

Breadcrumbs::for('pelanggan',function (BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Pelanggan', route('pelanggan.index'));
});
Breadcrumbs::for('pelangganDetail',function (BreadcrumbTrail $trail,$user){
    $trail->parent('pelanggan');
    $trail->push($user->user->name,route('pelanggan.show',$user->id));
});
Breadcrumbs::for('pelangganEdit',function (BreadcrumbTrail $trail,$user){
    $trail->parent('pelangganDetail',$user);
    $trail->push('Edit',route('pelanggan.edit',$user));
});

// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});
