<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Kategori Buku</title>
</head>

<body>
    <h1 class="mt-4">Kategori Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    // Pastikan peran pengguna diambil dari sesi pengguna dengan benar
                    $user_role = isset($_SESSION['user']['level']) ? $_SESSION['user']['level'] : '';

                    // Hanya tampilkan tombol tambah data jika peran pengguna adalah admin
                    if ($user_role != 'peminjam') {
                        echo '<a href="?page=kategoribuku_tambah" class="btn btn-primary mt-4">+ Tambah Data</a>';
                    }
                    ?>

                    <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
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
                        $query = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama_kategori']; ?>
                                </td>
                                <?php
                                // Hanya tampilkan tombol ubah dan hapus jika peran pengguna adalah admin
                                if ($user_role != 'peminjam') {
                                    echo '<td>';
                                    echo '<a href="?page=kategoribuku_ubah&&id=' . $data['kategori_id'] . '" class="btn btn-info">Ubah</a>';
                                    echo '<a onclick="return confirm(\'Apakah anda yakin ingin menghapus ?\');" href="?page=kategoribuku_hapus&&id=' . $data['kategori_id'] . '" class="btn btn-danger">Hapus</a>';
                                    echo '</td>';
                                }
                                ?>

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