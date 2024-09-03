<?php
// Include file konfigurasi
include "config.php";

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit();
}

// Ambil ID peminjaman dari URL
if (isset($_GET['id'])) {
    $id_peminjaman = $_GET['id'];
} else {
    // Jika tidak ada ID peminjaman, kembalikan pengguna ke halaman peminjaman.php
    header('location:index.php');
    exit();
}

// Query untuk mendapatkan data peminjaman
$query = mysqli_query($koneksi, "SELECT peminjaman.*, buku.judul AS judul_buku, user.nama_lengkap FROM peminjaman  
    LEFT JOIN buku ON buku.buku_id = peminjaman.buku_id 
    LEFT JOIN user ON user.user_id = peminjaman.user_id 
    WHERE peminjaman.peminjaman_id = '$id_peminjaman'");
$data = mysqli_fetch_array($query);

// Pastikan data peminjaman ditemukan
if (!$data) {
    // Jika data tidak ditemukan, kembalikan pengguna ke halaman peminjaman.php
    header('location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk Peminjaman</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Atur gaya cetak */
        @media print {

            /* Sembunyikan tombol cetak */
            .no-print {
                display: none;
            }

            /* Menetapkan lebar dan posisi tengah */
            .container-custom {
                width: 80%;
                /* Lebar kontainer */
                margin: auto;
                /* Menempatkan kontainer di tengah */
                margin-top: 100px;
                /* Jarak atas dari halaman */
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="container-custom">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title teks-center">Struk Peminjaman Buku</h3>
                </div>
                <div class="panel-body">
                    <p><strong>ID Peminjaman:</strong>
                        <?php echo isset($data['peminjaman_id']) ? $data['peminjaman_id'] : ''; ?>
                    </p>
                    <p><strong>Nama Peminjam:</strong>
                        <?php echo isset($data['nama_lengkap']) ? $data['nama_lengkap'] : ''; ?>
                    </p>
                    <p><strong>Buku:</strong>
                        <?php echo isset($data['judul_buku']) ? $data['judul_buku'] : ''; ?>
                    </p>
                    <p><strong>Tanggal Peminjaman:</strong>
                        <?php echo isset($data['tanggal_peminjaman']) ? $data['tanggal_peminjaman'] : ''; ?>
                    </p>
                    <p><strong>Tanggal Pengembalian:</strong>
                        <?php echo isset($data['tanggal_pengembalian']) ? $data['tanggal_pengembalian'] : ''; ?>
                    </p>
                    <p><strong>Status Peminjaman:</strong>
                        <?php echo isset($data['status_peminjaman']) ? $data['status_peminjaman'] : ''; ?>
                    </p>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary no-print" onclick="window.print()">Cetak Struk</button>
                    <a href="?page=manage_peminjaman" class="btn btn-secondary no-print">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>