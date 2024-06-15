<?= $this->extend('layouts/template') ?>
<?= $this->section("content") ?>
<style type="text/css">
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding-top: 80px;
        /* Tambahkan jarak atas untuk menghindari navbar menutupi form */
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .form-container {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
    }

    .form-group {
        margin-bottom: 20px;
    }

    h3 {
        text-align: center;
        margin-top: 0;
        margin-bottom: 20px;
        color: #333;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }

    input[type=text],
    input[type=number],
    textarea,
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }

    button:hover {
        background-color: #45a049;
    }

    /* Ubah warna navbar menjadi biru */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;

        /* Warna biru */
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 999;
    }
</style>

<!-- Tambahkan markup untuk navbar -->

<body>
    <div class="form-container">
        <h3>Tambah Inventaris</h3>
        <form action="/inventaris/store" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?> <!-- Tambahkan CSRF token untuk keamanan -->
            <div class="form-group">
                <label for="nama_inventaris">Nama Inventaris</label>
                <input type="text" id="nama_inventaris" name="nama_inventaris" required>
            </div>
            <div class="form-group">
                <label for="jumlah_inventaris">Jumlah Inventaris</label>
                <input type="number" id="jumlah_inventaris" name="jumlah_inventaris" min="1" required>
            </div>
            <div class="form-group">
                <label for="id_ruangan">Ruangan</label>
                <select name="id_ruangan" id="id_ruangan" required>
                    <option value="">Pilih Ruangan</option>
                    <?php foreach ($ruangan as $r) : ?>
                        <option value="<?= esc($r['id_ruangan']) ?>"><?= esc($r['nama_ruangan']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="id_operator">ID Operator:</label>
                <select id="id_operator" name="id_operator" required>
                    <option value="">Pilih Operator</option>
                    <?php foreach ($operator as $op) : ?>
                        <option value="<?= $op['id'] ?>"><?= $op['username'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar" required>
            </div>
            <button type="submit">Tambah Inventaris</button>
        </form>
    </div>
</body>
<?= $this->endSection() ?>