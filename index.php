<?php
include "config.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="ico" href="header.png" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">
            <img src="img/header.png" alt="/" height="30" width="25">
            Perpustakaan Digital
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Jam Hidup -->
        <div class="ms-auto text-white me-4">
            <div id="live-clock-container">
                <span id="live-clock" class="p-2"></span>
            </div>
        </div>
    </nav>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            var formattedTime = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

            document.getElementById('live-clock').innerHTML = formattedTime;

            setTimeout(updateClock, 1000);
        }

        updateClock();
    </script>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="?">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Navigasi</div>
                        <?php
                        if ($_SESSION['user']['level'] != 'peminjam') {
                            ?>
                            <a class="nav-link" href="?page=user">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Pengunjung
                            </a>
                            <a class="nav-link" href="?page=kategori">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="?page=buku">
                                <div class="sb-nav-link-icon"><img src="img/book.png" alt="/" height="25" width="25"></div>
                                Buku
                            </a>
                            <a class="nav-link" href="?page=manage_peminjaman">
                                <div class="sb-nav-link-icon"><img src="img/book.png" alt="/" height="25" width="25"></div>
                                Manage peminjaman
                            </a>
                            <?php
                        } else {
                            ?>
                            <!-- <a class="nav-link" href="?page=proses_pinjam">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Proses pinjam
                            </a> -->
                            <a class="nav-link" href="?page=koleksi">
                                <div class="sb-nav-link-icon"><i class="fas fa-bookmark"></i></div>
                                Koleksi
                            </a>
                            <a class="nav-link" href="?page=peminjaman">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Peminjam
                            </a>
                            <?php
                        }
                        ?>
                        <a class="nav-link" href="?page=ulasanbuku">
                            <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                            Ulasan
                        </a>
                        <?php
                        if ($_SESSION['user']['level'] != 'peminjam') {
                            ?>

                            <a class="nav-link" href="?page=laporan">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Laporan Peminjaman
                            </a>
                            <?php
                        }
                        ?>
                        <a class="nav-link" onclick="return confirm('Apakah anda yakin ingin logout ?');"
                            href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-power-off"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php
                    echo $_SESSION['user']['username'];
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                    if (file_exists($page . '.php')) {
                        include $page . '.php';
                    } else {
                        include '404.php';
                    }
                    ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Perpustakaan Digital 2024</div>
                        <div>
                            <a href="policy.php">Privacy Policy</a>
                            &middot;
                            <a href="terms.php">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>