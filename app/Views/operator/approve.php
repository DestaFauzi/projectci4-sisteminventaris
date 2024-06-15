<?= $this->extend('../layouts/template') ?>
<?= $this->section("content") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Peminjaman</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Approve Peminjaman</h1>
                        <div class="card-text">
                            <p><strong>Inventaris:</strong> <?= $peminjaman['inventaris_id'] ?></p>
                            <p><strong>Peminjam:</strong> <?= $peminjaman['user_id'] ?></p>
                            <p><strong>Tanggal Pinjam:</strong> <?= $peminjaman['tanggal_pinjam'] ?></p>
                            <p><strong>Tanggal Kembali:</strong> <?= $peminjaman['tanggal_kembali'] ?></p>
                        </div>
                        <?= form_open('/operator/approve-action/' . $peminjaman['id']) ?>
                        <button type="submit" class="btn btn-primary">Approve</button>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?= $this->endSection() ?>