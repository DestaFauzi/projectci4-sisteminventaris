<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Persetujuan Peminjaman</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        .success-msg {
            color: green;
        }

        .error-msg {
            color: red;
        }

        .action-links a {
            padding: 5px 10px;
            text-decoration: none;
            margin: 0 5px;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .action-links a:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Daftar Persetujuan Peminjaman</h1>
    <?php if (session()->getFlashdata('success')) : ?>
        <p class="success-msg"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <p class="error-msg"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <table>
        <tr>
            <th>ID Peminjaman</th>
            <th>ID User</th>
            <th>ID Inventaris</th>
            <th>Jumlah Pinjam</th>
            <th>Tanggal Peminjaman</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($peminjaman as $item) : ?>
            <tr>
                <td><?= $item['id_peminjaman'] ?></td>
                <td><?= $item['id_user'] ?></td>
                <td><?= $item['id_inventaris'] ?></td>
                <td><?= $item['jumlah_pinjam'] ?></td>
                <td><?= $item['tanggal_peminjaman'] ?></td>
                <td><?= $item['status'] ?></td>
                <td class="action-links">
                    <a href="/peminjaman/approve/<?= $item['id_peminjaman'] ?>">Setujui</a>
                    <a href="/peminjaman/reject/<?= $item['id_peminjaman'] ?>">Tolak</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>