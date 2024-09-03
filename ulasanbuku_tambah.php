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
    <h1 class="mt-4">Ulasan Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                        <?php
                        if (isset($_POST['submit'])) {
                            $buku_id = $_POST['buku_id'];
                            $user_id = $_SESSION['user']['user_id'];
                            $ulasan_id = isset($_POST['ulasan_id']) ? $_POST['ulasan_id'] : null;
                            $ulasan = $_POST['ulasan'];
                            $rating = $_POST['rating'];

                            $query = mysqli_query($koneksi, "INSERT INTO ulasanbuku (buku_id, user_id, ulasan_id, ulasan, rating)
                            VALUES ('$buku_id', '$user_id', '$ulasan_id', '$ulasan', '$rating')");

                            if ($query) {
                                echo '<script>alert("Tambah data ulasan berhasil.");</script>';
                            } else {
                                echo '<script>alert("Tambah data ulasan gagal.");</script>';
                            }
                        }
                        ?>

                        <div class="row mb-3">
                            <div class="col-md-2">Buku</div>
                            <div class="col-md-8">
                                <select name="buku_id" class="form-control">
                                    <?php
                                    $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                                    while ($buku = mysqli_fetch_array($buk)) {
                                        ?>
                                        <option value="<?php echo $buku['buku_id']; ?>">
                                            <?php echo $buku['judul']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Ulasan</div>
                            <div class="col-md-8">
                                <textarea name="ulasan" rows="5" class="form-control col-md-8"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Rating</div>
                            <div class="col-md-8">
                                <select name="rating" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
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
                                <a href="?page=ulasanbuku" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>