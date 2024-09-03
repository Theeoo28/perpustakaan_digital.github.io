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
    <h1 class="mt-4">Kategori Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (isset($_POST['submit'])) {
                        $kategori = $_POST['kategori'];
                        $query = mysqli_query($koneksi, "INSERT INTO kategoribuku(nama_kategori)
                            values('$kategori')");

                        if ($query) {
                            echo '<script>alert("Tambah data berhasil.");</script>';
                        } else {
                            echo '<script>alert("Tambah data gagal  .");</script>';
                        }
                    }
                    ?>
                    <form method="post">
                        <div class="row mb-3">
                            <div class="col-md-2">Nama Kategori</div>
                            <div class="col-md-8"><input type="text" class="from-control col-md-10" name="kategori">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">

                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary" name="submit"
                                    value="submit">Reset</button>
                                <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>