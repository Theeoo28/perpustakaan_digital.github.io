<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Ubah Koleksi</title>
</head>

<body>
    <h1 class="mt-4">Ubah Koleksi</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                        <?php
                        include 'config.php';
                        $id = $_GET['id'];

                        if (isset($_POST['submit'])) {
                            $buku_id = $_POST['buku_id'];
                            $user_id = $_SESSION['user']['user_id'];

                            $query = mysqli_query($koneksi, "UPDATE koleksipribadi SET buku_id='$buku_id', user_id='$user_id' WHERE koleksi_id=$id");

                            if ($query) {
                                echo '<script>alert("Ubah data koleksi berhasil.");</script>';
                            } else {
                                echo '<script>alert("Ubah data koleksi gagal.");</script>';
                            }
                        }

                        $query = mysqli_query($koneksi, "SELECT * FROM koleksipribadi WHERE koleksi_id=$id");
                        $data = mysqli_fetch_array($query);
                        ?>

                        <div class="row mb-3">
                            <div class="col-md-2">Buku</div>
                            <div class="col-md-8">
                                <select name="buku_id" class="form-control">
                                    <?php
                                    $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                    while ($buku = mysqli_fetch_array($buk)) {
                                        ?>
                                        <option <?php if ($data['buku_id'] == $buku['buku_id'])
                                            echo 'selected'; ?>
                                            value="<?php echo $buku['buku_id']; ?>">
                                            <?php echo $buku['judul']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit"
                                    value="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary" name="submit"
                                    value="submit">Reset</button>
                                <a href="?page=koleksi" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
