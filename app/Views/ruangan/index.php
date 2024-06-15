<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">DATA INVENTARIS</h2>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Ruangan</th>
                            <th scope="col">Gedung</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tbl_ruangan as $rg) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($rg['id_ruangan']); ?></td>
                                <td><?= esc($rg['nama_ruangan']); ?></td>
                                <td><?= esc($rg['gedung']); ?></td>
                                <td>
                                    <a href="/tambahinventaris" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="/tambahinventaris" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>