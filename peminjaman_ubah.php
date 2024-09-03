<?php
// Ambil nilai judul buku dari parameter URL
if (isset($_GET['judul_buku'])) {
    $judul_buku = urldecode($_GET['judul_buku']);
}
?>

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
    <h1 class="mt-4">Peminjaman Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            if (isset($_POST['submit'])) {
                                $buku_id = $_POST['buku_id'];
                                $user_id = $_SESSION['user']['user_id'];
                                $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                                $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                                $status_peminjaman = $_POST['status_peminjaman'];

                                $query = mysqli_query($koneksi, "UPDATE peminjaman SET buku_id='$buku_id', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman' WHERE peminjaman_id='$id'");

                                if ($query) {
                                    echo '<script>alert("Ubah data ulasan berhasil.");</script>';
                                } else {
                                    echo '<script>alert("Ubah data ulasan gagal.");</script>';
                                }
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE peminjaman_id = '$id'");
                        $data = mysqli_fetch_array($query);
                        ?>
                        <input type="hidden" name="buku_id" value="<?php echo $data['buku_id']; ?>">
                        <div class="row mb-3">
                            <div class="col-md-2">Buku</div>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                    value="<?php echo isset($judul_buku) ? $judul_buku : ''; ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2">Tanggal Peminjaman</div>
                            <div class="col-md-8">
                                <input type="date" class="form-control"
                                    value="<?php echo $data['tanggal_peminjaman'] ?>" name="tanggal_peminjaman">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tanggal Pengembalian</div>
                            <div class="col-md-8">
                                <input type="date" class="form-control"
                                    value="<?php echo $data['tanggal_pengembalian'] ?>" name="tanggal_pengembalian">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Status Peminjaman</div>
                            <div class="col-md-8">
                                <select name="status_peminjaman" class="form-control" <?php echo ($_SESSION['user']['level'] === 'user') ? 'disabled' : ''; ?>>
                                    <?php if ($_SESSION['user']['level'] === 'admin') { ?>
                                        <option value="dipinjam" <?php echo ($data['status_peminjaman'] == 'dipinjam') ? 'selected' : ''; ?> disabled>Dipinjam</option>
                                        <option value="dikembalikan" <?php echo ($data['status_peminjaman'] == 'dikembalikan') ? 'selected' : ''; ?>>Dikembalikan</option>
                                    <?php } else { ?>
                                        <option value="dipinjam" <?php echo ($data['status_peminjaman'] == 'dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
                                        <option value="dikembalikan" <?php echo ($data['status_peminjaman'] == 'dikembalikan') ? 'selected' : ''; ?> disabled>Dikembalikan</option>
                                    <?php } ?>
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
                                <?php if ($_SESSION['user']['level'] === 'admin') { ?>
                                    <a href="?page=manage_peminjaman" class="btn btn-danger">Kembali</a>
                                <?php } else { ?>
                                    <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>