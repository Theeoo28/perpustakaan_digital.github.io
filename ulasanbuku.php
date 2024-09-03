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
    <h1 class="mt-4">Ulasan Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="?page=ulasanbuku_tambah" class="btn btn-primary mt-4">+ Tambah Data</a>
                    <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Pengguna</th>
                            <th>Buku</th>
                            <th>Ulasan</th>
                            <th>Rating</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        include 'config.php';
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT user.*, buku.*, ulasanbuku.* 
                                FROM user 
                                INNER JOIN ulasanbuku ON user.user_id = ulasanbuku.user_id 
                                INNER JOIN buku ON buku.buku_id = ulasanbuku.buku_id");

                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo isset($data['nama_lengkap']) ? $data['nama_lengkap'] : ''; ?>
                                </td>
                                <td>
                                    <?php echo isset($data['judul']) ? $data['judul'] : ''; ?>
                                </td>
                                <td>
                                    <?php echo isset($data['ulasan']) ? $data['ulasan'] : ''; ?>
                                </td>
                                <td>
                                    <?php echo isset($data['rating']) ? $data['rating'] : ''; ?>
                                </td>
                                <td>
                                    <?php
                                    // Periksa apakah pengguna adalah admin atau pemilik ulasan
                                    $is_admin = $_SESSION['user']['level'] == 'admin';
                                    $is_owner = $data['user_id'] == $_SESSION['user']['user_id'];

                                    // Tampilkan tombol aksi sesuai dengan kondisi
                                    if ($is_admin || $is_owner) {
                                        echo '<a href="?page=ulasanbuku_ubah&&id=' . $data['ulasan_id'] . '" class="btn btn-info">Ubah</a>';
                                        echo '<a onclick="return confirm(\'Apakah anda yakin ingin menghapus ?\');" href="?page=ulasanbuku_hapus&&id=' . $data['ulasan_id'] . '" class="btn btn-danger">Hapus</a>';
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