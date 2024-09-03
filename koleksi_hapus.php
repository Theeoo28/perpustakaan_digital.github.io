<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM koleksipribadi WHERE koleksi_id = $id");
?>
<script>
    alert('Hapus koleksi buku berhasil');
    location.href = "index.php?page=koleksi"
</script>