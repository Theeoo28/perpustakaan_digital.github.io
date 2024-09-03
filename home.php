<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Home</title>
    <style>
        /* CSS tambahan */
        .card-horizontal {
            display: flex;
            flex-direction: row;
            justify-content: center; /* Tengahkan kartu */
        }
    </style>
</head>

<body>
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="card-horizontal">
        <div class="card bg-primary text-white mb-4 mx-1 col-xl-<?php echo ($_SESSION['user']['level'] === 'admin') ? '3' : '4'; ?>  col-md-6">
            <div class="card-body">
                <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategoribuku")); ?>
                Total Kategori
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=kategori">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
        <div class="card bg-warning text-white mb-4 mx-1 col-xl-<?php echo ($_SESSION['user']['level'] === 'admin') ? '3' : '4'; ?> col-md-6">
            <div class="card-body">
                <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku")); ?>
                Total Buku
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=buku">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
        <div class="card bg-success text-white mb-4 mx-1 col-xl-<?php echo ($_SESSION['user']['level'] === 'admin') ? '3' : '4'; ?> col-md-6">
            <div class="card-body">
                <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasanbuku")); ?>
                Total Ulasan
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=ulasanbuku">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
        <?php if ($_SESSION['user']['level'] === 'admin') { ?>
        <div class="card bg-danger text-white mb-4 mx-1 col-xl-3 col-md-6">
            <div class="card-body">
                <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));
                ?>
                Total User
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=user">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td width="200">Nama</td>
                    <td width="1">:</td>
                    <td><?php echo $_SESSION['user']['nama_lengkap'] ?></td>
                </tr>
                <tr>
                    <td width="200">Level User</td>
                    <td width="1">:</td>
                    <td>
                        <?php echo $_SESSION['user']['level'] ?>
                    </td>
                </tr>
                <tr>
                    <td width="200">Tanggal Login</td>
                    <td width="1">:</td>
                    <td>
                        <?php echo date("d-m-y"); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>