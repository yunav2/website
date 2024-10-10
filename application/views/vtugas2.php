<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <table>
        <tr>
            <th>Nama Mahasiswa</th>
            <th>Nim Mahasiswa</th>
            <th>Alamat Mahasiswa</th>
        </tr>
        <?php foreach($mahasiswa as $mhs) : ?>
        <tr>
            <td><?= $mhs['nama'] ?></td>
            <td><?= $mhs['nim'] ?></td>
            <td><?= $mhs['alamat'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>