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
    <h1 class="mt-4">Koleksi Saya</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="?page=koleksi_tambah" class="btn btn-primary mt-4">+ Tambah Data</a>
                    <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Buku</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        // koleksi.php
                        
                        include 'config.php';
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT koleksipribadi.koleksi_id, kategoribuku.nama_kategori, buku.judul
                FROM koleksipribadi
                INNER JOIN kategoribuku_relasi ON koleksipribadi.buku_id = kategoribuku_relasi.buku_id
                INNER JOIN buku ON kategoribuku_relasi.buku_id = buku.buku_id
                INNER JOIN kategoribuku ON kategoribuku_relasi.kategori_id = kategoribuku.kategori_id");

                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i++; ?>
                                </td>
                                <td>
                                    <?php echo isset($data['nama_kategori']) ? $data['nama_kategori'] : ''; ?>
                                </td>
                                <td>
                                    <?php echo isset($data['judul']) ? $data['judul'] : ''; ?>
                                </td>
                                <td>
                                    <a href="?page=koleksi_ubah&id=<?php echo isset($data['koleksi_id']) ? $data['koleksi_id'] : ''; ?>"
                                        class="btn btn-info">Ubah</a>
                                    <a href="?page=proses_pinjam&judul=<?php echo urlencode($data['judul']); ?>"
                                        class="btn btn-primary">Pinjam</a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus ?');"
                                        href="?page=koleksi_hapus&id=<?php echo isset($data['koleksi_id']) ? $data['koleksi_id'] : ''; ?>"
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