<?php
// proses_pinjam.php

include 'config.php';
$judul = isset($_GET['judul']) ? urldecode($_GET['judul']) : '';

if (isset($_POST['submit'])) {
    // Periksa apakah judul buku yang diterima dari parameter adalah valid
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $query_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul = '$judul'");
    $data_buku = mysqli_fetch_assoc($query_buku);

    if ($data_buku) {
        // Jika judul buku valid, lanjutkan proses peminjaman
        $buku_id = $data_buku['buku_id'];
        $user_id = $_SESSION['user']['user_id'];
        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
        $status_peminjaman = $_POST['status_peminjaman'];

        $query = mysqli_query($koneksi, "INSERT INTO peminjaman(buku_id, user_id, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman)
                            VALUES ('$buku_id','$user_id','$tanggal_peminjaman','$tanggal_pengembalian','$status_peminjaman')");

        if ($query) {
            echo '<script>alert("Peminjaman berhasil.");</script>';
        } else {
            echo '<script>alert("Peminjaman gagal.");</script>';
        }
    } else {
        // Jika judul buku tidak valid, tampilkan pesan kesalahan
        echo '<script>alert("Judul buku tidak valid.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Tambah Peminjaman</title>
</head>

<body>
    <h1 class="mt-4">Peminjaman Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                        <input type="hidden" name="judul" value="<?php echo $judul; ?>"> <!-- Tambahkan input tersembunyi untuk judul buku -->
                        <div class="row mb-3">
                            <div class="col-md-2">Judul Buku</div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="<?php echo $judul; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tanggal Peminjaman</div>
                            <div class="col-md-8">
                                <input type="date" class="form-control" name="tanggal_peminjaman">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tanggal Pengembalian</div>
                            <div class="col-md-8">
                                <input type="date" class="form-control" name="tanggal_pengembalian">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Status Peminjaman</div>
                            <div class="col-md-8">
                                <select name="status_peminjaman" class="form-control">
                                    <option value="dipinjam">Dipinjam</option>
                                    <option value="dikembalikan" disabled>Dikembalikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary" name="submit" value="submit">Reset</button>
                                <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
