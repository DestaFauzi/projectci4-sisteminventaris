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
                            <th scope="col">ID Inventaris</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Id Operator</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tbl_inventaris as $inv) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($inv['id_inventaris']); ?></td>
                                <td><?= esc($inv['nama_inventaris']); ?></td>
                                <td><?= esc($inv['jumlah_inventaris']); ?></td>
                                <td><?= esc($inv['stok']); ?></td>
                                <td><?= esc($inv['nama_ruangan']); ?></td>
                                <td><?= esc($inv['id_operator']); ?></td>
                                <td>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($inv['gambar']) ?>" width="70" alt="Gambar" class="img-thumbnail">
                                </td>
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