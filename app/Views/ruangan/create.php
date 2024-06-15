<!-- app/Views/ruangan/create.php -->

<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2>Form Tambah Ruangan</h2>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/ruangan/store" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="nama_ruangan">Nama Ruangan</label>
                    <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" required>
                </div>
                <div class="form-group">
                    <label for="gedung">Nama Gedung</label>
                    <input type="text" class="form-control" id="gedung" name="gedung" required>
                </div>
                <!-- Tambahkan input untuk kolom lainnya sesuai kebutuhan -->
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>