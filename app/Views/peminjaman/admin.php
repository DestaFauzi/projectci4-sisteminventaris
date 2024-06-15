<!-- app/Views/admin/peminjaman/index.php -->

<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2>Data Peminjaman</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID Peminjaman</th>
                            <th scope="col">ID User</th>
                            <th scope="col">ID Inventaris</th>
                            <th scope="col">Jumlah Pinjam</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Tanggal Pengembalian</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($peminjaman as $p) : ?>
                            <tr>
                                <td><?= $p['id_peminjaman'] ?></td>
                                <td><?= $p['id_user'] ?></td>
                                <td><?= $p['id_inventaris'] ?></td>
                                <td><?= $p['jumlah_pinjam'] ?></td>
                                <td><?= $p['tanggal_peminjaman'] ?></td>
                                <td><?= $p['tanggal_pengembalian'] ?></td>
                                <td><?= $p['status'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>