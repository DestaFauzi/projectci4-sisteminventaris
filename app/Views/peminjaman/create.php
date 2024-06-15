<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        select,
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-msg {
            color: red;
            margin-top: 10px;
        }

        .success-msg {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Form Peminjaman</h1>
    <?php if (session()->getFlashdata('error')) : ?>
        <p class="error-msg"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')) : ?>
        <p class="success-msg"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <form action="/peminjaman/store" method="post">
        <?= csrf_field() ?>
        <label for="id_inventaris">Nama Inventaris:</label>
        <select name="id_inventaris" required>
            <?php foreach ($inventaris as $item) : ?>
                <option value="<?= $item['id_inventaris'] ?>"><?= $item['nama_inventaris'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="jumlah_pinjam">Jumlah Pinjam:</label>
        <input type="number" name="jumlah_pinjam" required><br>
        <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
        <input type="date" name="tanggal_peminjaman" required><br>
        <button type="submit">Pinjam</button>
    </form>
</body>

</html>