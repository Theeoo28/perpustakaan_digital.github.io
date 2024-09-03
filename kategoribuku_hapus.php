<?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM kategoribuku WHERE kategori_id = $id");
    ?>
    <script>
        alert('hapus kategori berhasil');
        location.href = "index.php?page=kategori";
    </script>
