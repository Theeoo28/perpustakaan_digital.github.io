<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM ulasanbuku WHERE ulasan_id = $id");
?>
<script>
    alert('Hapus ulasan buku berhasil');
    location.href = "index.php?page=ulasanbuku"
</script>