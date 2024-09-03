<?php
include "config.php";

    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE peminjaman_id = '$id'");
    ?>
    <script>
        alert('hapus kategori berhasil');
        location.href = "index.php?page=manage_peminjaman";
    </script>
