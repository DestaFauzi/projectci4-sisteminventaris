<?= $this->extend('layouts/template') ?>

<?= $this->section("content") ?>
<link rel="stylesheet" type="text/css" href="/style.css">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Hello, <?= session()->get('username') ?></h1>
                <p class="lead">Selamat datang di halaman <?= session()->get('role') ?></p>
                <hr class="my-4">
                <p>Silakan pilih menu di bawah ini untuk mengelola sistem:</p>
                <div class="btn-group" role="group" aria-label="Menu navigasi">
                    <a href="/datainventaris" class="btn btn-primary btn-lg" role="button">
                        Data Inventaris
                    </a>
                    <a href="/tambahinventaris" class="btn btn-primary btn-lg" role="button">
                        Tambah Inventaris
                    </a>
                    <a href="/user/datauser" class="btn btn-primary btn-lg" role="button">
                        Data Pengguna
                    </a>
                    <a href="/user/tambahuser" class="btn btn-primary btn-lg" role="button">
                        Tambah Pengguna
                    </a>
                    <a href="/dataruangan" class="btn btn-primary btn-lg" role="button">
                        Data Ruangan
                    </a>
                    <a href="/ruangan/create" class="btn btn-primary btn-lg" role="button">
                        Tambah Ruangan
                    </a>
                    <a href="/peminjaman/detail" class="btn btn-primary btn-lg" role="button">
                        Data Peminjaman
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>