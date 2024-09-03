<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Buku</title>
</head>

<body>
    <h1 class="mt-4">Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    // Pastikan peran pengguna diambil dari sesi pengguna dengan benar
                    $user_role = isset($_SESSION['user']['level']) ? $_SESSION['user']['level'] : '';

                    // Hanya tampilkan tombol tambah data jika peran pengguna adalah admin
                    if ($user_role != 'peminjam') {
                        echo '<a href="?page=buku_tambah" class="btn btn-primary mt-4">+ Tambah Buku</a>';
                    }
                    ?>

                    <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Deskripsi</th>
                            <?php
                            // Hanya tampilkan kolom aksi jika peran pengguna adalah admin
                            if ($user_role != 'peminjam') {
                                echo '<th>Aksi</th>';
                            }
                            ?>
                        </tr>
                        <?php
                        include 'config.php';
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT buku.*, kategoribuku.nama_kategori FROM buku 
                                LEFT JOIN kategoribuku_relasi ON buku.buku_id = kategoribuku_relasi.buku_id 
                                LEFT JOIN kategoribuku ON kategoribuku_relasi.kategori_id = kategoribuku.kategori_id");

                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama_kategori']; ?>
                                </td>
                                <td>
                                    <?php echo $data['judul']; ?>
                                </td>
                                <td>
                                    <?php echo $data['penulis']; ?>
                                </td>
                                <td>
                                    <?php echo $data['penerbit']; ?>
                                </td>
                                <td>
                                    <?php echo $data['tahun_terbit']; ?>
                                </td>
                                <td>
                                    <?php echo $data['deskripsi']; ?>
                                </td>
                                <?php
                                // Hanya tampilkan tombol ubah dan hapus jika peran pengguna adalah admin
                                if ($user_role != 'peminjam') {
                                    echo '<td>';
                                    echo '<a href="?page=buku_ubah&&id=' . $data['buku_id'] . '" class="btn btn-info">Ubah</a>';
                                    echo '<a onclick="return confirm(\'Apakah anda yakin ingin menghapus ?\');" href="?page=buku_hapus&&id=' . $data['buku_id'] . '" class="btn btn-danger">Hapus</a>';
                                    echo '</td>';
                                }
                                ?>
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