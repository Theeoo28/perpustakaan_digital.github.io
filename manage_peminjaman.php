<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Kelola Peminjaman</title>
</head>

<body>
    <h1 class="mt-4">Kelola Peminjaman</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        include 'config.php';
                        $query = mysqli_query($koneksi, "SELECT user.nama_lengkap, buku.judul, peminjaman.peminjaman_id, peminjaman.tanggal_peminjaman, 
                        peminjaman.tanggal_pengembalian, peminjaman.status_peminjaman FROM peminjaman LEFT JOIN user 
                        ON user.user_id = peminjaman.user_id LEFT JOIN buku ON buku.buku_id = peminjaman.buku_id");

                        $i = 1;
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama_lengkap']; ?>
                                </td>
                                <td>
                                    <?php echo $data['judul']; ?>
                                </td>
                                <td>
                                    <?php echo $data['tanggal_peminjaman']; ?>
                                </td>
                                <td>
                                    <?php echo $data['tanggal_pengembalian']; ?>
                                </td>
                                <td>
                                    <?php echo $data['status_peminjaman']; ?>
                                </td>
                                <td>
                                    <a href="?page=peminjaman_ubah&id=<?php echo $data['peminjaman_id']; ?>&judul_buku=<?php echo urlencode($data['judul']); ?>"
                                        class="btn btn-info">Ubah</a>
                                    <?php
                                    ?>
                                    <a href="cetak_struk.php?id=<?php echo $data['peminjaman_id']; ?>" target="_blank"
                                        class="btn btn-success">Cetak Struk</a>
                                    <?php
                                    ?>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus?');"
                                        href="peminjaman_hapus.php?id=<?php echo $data['peminjaman_id']; ?>"
                                        class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>