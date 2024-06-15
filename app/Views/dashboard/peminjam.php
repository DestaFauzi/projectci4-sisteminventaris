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
                <p>Silakan pilih menu di bawah ini untuk menggunakan sistem:</p>
                <div class="btn-group" role="group" aria-label="Menu navigasi">
                    <a href="/datainventaris/peminjam" class="btn btn-primary btn-lg" role="button">
                        Data Inventaris
                    </a>
                    <a href="/dataruangan/user" class="btn btn-primary btn-lg" role="button">
                        Data Ruangan
                    </a>
                    <a href="/peminjaman" class="btn btn-primary btn-lg" role="button">
                        Data Peminjaman
                    </a>
                    <a href="/formpinjam" class="btn btn-primary btn-lg" role="button">
                        Form Peminjaman
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>