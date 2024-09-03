<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Tambah Kategori</title>
</head>

<body>
    <h1 class="mt-4">Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                        <?php
                        if (isset($_POST['submit'])) {
                            $kategori_id = $_POST['kategori_id'];
                            $judul = $_POST['judul'];
                            $penulis = $_POST['penulis'];
                            $penerbit = $_POST['penerbit'];
                            $tahun_terbit = $_POST['tahun_terbit'];
                            $deskripsi = $_POST['deskripsi'];
                            $query = mysqli_query($koneksi, "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, deskripsi)
                            VALUES ('$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");

                            if ($query) {
                                $last_inserted_id = mysqli_insert_id($koneksi);

                                $query_relasi = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi (buku_id, kategori_id)
                                       VALUES ('$last_inserted_id', '$kategori_id')");

                                if ($query_relasi) {
                                    echo '<script>alert("Tambah data buku berhasil.");</script>';
                                } else {
                                    echo '<script>alert("Tambah data buku gagal (relasi).");</script>';
                                }
                            } else {
                                echo '<script>alert("Tambah data buku gagal.");</script>';
                            }
                        }
                        ?>
                        <div class="row mb-3">
                            <div class="col-md-2">Kategori</div>
                            <div class="col-md-8">
                                <select name="kategori_id" class="form-control" id="">
                                    <?php
                                    $kat = mysqli_query($koneksi, "SELECT*FROM kategoribuku");
                                    while ($kategori = mysqli_fetch_array($kat)) {
                                        ?>
                                        <option value="<?php echo $kategori['kategori_id']; ?>">
                                            <?php echo $kategori['nama_kategori']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Judul</div>
                            <div class="col-md-8"><input type="text" class="form-control col-md-10" name="judul">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penulis</div>
                            <div class="col-md-8"><input type="text" class="form-control col-md-10" name="penulis">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penerbit</div>
                            <div class="col-md-8"><input type="text" class="form-control col-md-10" name="penerbit">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tahun Terbit</div>
                            <div class="col-md-8"><input type="number" class="form-control col-md-10"
                                    name="tahun_terbit">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Deskripsi</div>
                            <div class="col-md-8">
                                <textarea name="deskripsi" rows="5" class="form-control col-md-8"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">

                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary" name="submit"
                                    value="submit">Reset</button>
                                <a href="?page=buku" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>