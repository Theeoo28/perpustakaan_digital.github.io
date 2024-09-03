<?php
    $id = $_GET['id'];
    
    // Hapus terlebih dahulu entri yang terkait di tabel kategoribuku_relasi
    $query_delete_relasi = mysqli_query($koneksi, "DELETE FROM kategoribuku_relasi WHERE buku_id = $id");

    if ($query_delete_relasi) {
        // Jika penghapusan relasi berhasil, lanjutkan untuk menghapus buku
        $query_delete_buku = mysqli_query($koneksi, "DELETE FROM buku WHERE buku_id = $id");

        if ($query_delete_buku) {
            // Jika penghapusan buku berhasil, redirect kembali ke halaman buku
            echo '<script>alert("Hapus buku berhasil.");</script>';
            echo '<script>location.href = "index.php?page=buku";</script>';
        } else {
            // Jika penghapusan buku gagal
            echo '<script>alert("Gagal menghapus buku.");</script>';
            echo '<script>history.back();</script>';
        }
    } else {
        // Jika penghapusan relasi gagal
        echo '<script>alert("Gagal menghapus relasi kategori buku.");</script>';
        echo '<script>history.back();</script>';
    }
