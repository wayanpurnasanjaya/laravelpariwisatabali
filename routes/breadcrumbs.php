<?php

//dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

//kabupaten
Breadcrumbs::for('kabupaten', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Kabupaten', route('kabupaten.index'));
});

//Tambah Data kabupaten
Breadcrumbs::for('Tambah Data Kabupaten', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Kabupaten', route('kabupaten.index'));
    $trail->push('Tambah Data', route('kabupaten.create'));
});

//Edit Data kabupaten
Breadcrumbs::for('Edit Data Kabupaten', function ($trail,$kabupaten) {
    $trail->parent('dashboard');
    $trail->push('Kabupaten', route('kabupaten.index'));
    $trail->push('Edit Data', route('kabupaten.edit',$kabupaten));
});

//kecamatan
Breadcrumbs::for('Kecamatan', function ($trail,$kabupaten) {
    $trail->parent('dashboard');
    $trail->push('Kabupaten', route('kabupaten.index'));
    $trail->push('Kecamatan', route('kecamatan.index',$kabupaten));
});

//Tambah Data Kecamatan
Breadcrumbs::for('Tambah Data Kecamatan', function ($trail,$kabupaten) {
    $trail->parent('dashboard');
    $trail->push('Kabupaten', route('kabupaten.index'));
    $trail->push('Kecamatan', route('kecamatan.index',$kabupaten));
    $trail->push('Tambah Data ', route('kecamatan.create',$kabupaten));

});

//Edit Data kecamatan
Breadcrumbs::for('Edit Data Kecamatan', function ($trail,$kabupaten,$kecamatan) {
    $trail->parent('dashboard');
    $trail->push('Kabupaten', route('kabupaten.index'));
    $trail->push('Kecamatan', route('kecamatan.index',$kabupaten));
    $trail->push('Edit Data', route('kecamatan.edit',[$kabupaten,$kecamatan]));
});

//kontent
Breadcrumbs::for('content', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Content', route('content.index'));
});

//Tambah kontent
Breadcrumbs::for('Tambah Data Content', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('content', route('content.index'));
    $trail->push('Tambah Data', route('content.create'));
});

//Edit kontent
Breadcrumbs::for('Edit Data Content', function ($trail, $content) {
    $trail->parent('dashboard');
    $trail->push('content', route('content.index'));
    $trail->push('Edit Data', route('content.edit', $content));
});

//Edit status publish
Breadcrumbs::for('Edit Data Status', function ($trail, $content) {
    $trail->parent('dashboard');
    $trail->push('content', route('content.index'));
    $trail->push('Edit Data Status', route('content.editStatus', $content));
});

//Show data content
Breadcrumbs::for('Lihat Data Content', function ($trail, $content) {
    $trail->parent('dashboard');
    $trail->push('content', route('content.index'));
    $trail->push('Lihat Data', route('content.show', $content));
});

//user
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('user', route('user.index'));
});

//Tambah Data user
Breadcrumbs::for('Tambah Data User', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('user', route('user.index'));
    $trail->push('Tambah Data', route('user.create'));
});

//Edit Data user
Breadcrumbs::for('Edit Data User', function ($trail, $user) {
    $trail->parent('dashboard');
    $trail->push('user', route('user.index'));
    $trail->push('Edit Data', route('user.edit',$user));
});