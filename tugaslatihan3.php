<?php
session_start(); 

if (!isset($_SESSION['array_data_penjualan'])) {
    $_SESSION['array_data_penjualan'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    array_push(
        $_SESSION['array_data_penjualan'],
        array(
            "nama_produk" => $_POST['nama_produk'],
            "harga_produk" => $_POST['harga_produk'],
            "jumlah_terjual" => $_POST['jumlah_terjual'],
            "total" => $_POST['harga_produk'] * $_POST['jumlah_terjual']
        )
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pencatatan Data Penjualan</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Sistem Pencatatan Penjualan</h1>
    <form action="" method="post">
        <label for="">Nama Produk</label>
        <input type="text" name="nama_produk" required>
        <br>
        <label for="">Harga Produk</label>
        <input type="number" name="harga_produk" required>
        <br>
        <label for="">Jumlah Terjual</label>
        <input type="number" name="jumlah_terjual" required>
        <br>
        <button type="submit">Simpan</button>
    </form>   
    <table>
        <tr>
            <th>Nama</th>
            <th>Harga Per Produk</th>
            <th>Jumlah Terjual</th>
            <th>Total</th>
        </tr>
        <?php foreach ($_SESSION['array_data_penjualan'] as $data) { ?>
            <tr>
                <td><?php echo htmlspecialchars($data["nama_produk"]); ?></td>
                <td><?php echo htmlspecialchars($data["harga_produk"]); ?></td>
                <td><?php echo htmlspecialchars($data["jumlah_terjual"]); ?></td>
                <td><?php echo htmlspecialchars($data["total"]); ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>