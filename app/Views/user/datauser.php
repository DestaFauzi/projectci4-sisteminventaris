<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">DATA USER</h2>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tbl_users as $usr) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($usr['username']); ?></td>
                                <td><?= esc($usr['email']); ?></td>
                                <td><?= esc($usr['role']); ?></td>
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