<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman</title>
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
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #e9f5f5;
        }

        table td a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body>
    <h1>Riwayat Peminjaman</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Inventaris</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($peminjaman as $item) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= esc($item['id_inventaris']); ?></td>
                    <td><?= esc($item['tanggal_peminjaman']); ?></td>
                    <td><?= esc($item['tanggal_pengembalian']); ?></td>
                    <td><?= esc($item['status']); ?></td>
                    <td>
                        <?php if ($item['status'] == 'approved') : ?>
                            <a href="/peminjam/return/<?= $item['id_peminjaman'] ?>">Kembalikan</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>