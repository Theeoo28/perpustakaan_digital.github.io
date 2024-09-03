<?php
// Include file konfigurasi
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>About Us - Perpustakaan Digital</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Perpustakaan Digital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="terms.php">Terms & Conditions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="py-5 bg-light">
        <div class="container">
            <h1 class="display-4">About Us</h1>
            <p class="lead">Perpustakaan Digital is an online library platform dedicated to providing access to a wide range
                of digital books and resources for readers of all ages and interests.</p>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <p class="lead">Our mission is to promote literacy, learning, and the love of reading by making high-quality
                    digital books accessible to everyone. Whether you're a student, a professional, or simply an avid reader,
                    you'll find a diverse collection of e-books and resources to explore and enjoy.</p>
                <p>We are committed to continuously expanding our collection and improving our platform to better serve our
                    users. We believe that access to knowledge and information is a fundamental human right, and we strive to
                    make learning and reading accessible to all.</p>
                <p>Thank you for choosing Perpustakaan Digital as your online reading destination. Happy reading!</p>
            </div>
        </div>
    </div>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <?php echo date("Y"); ?> Perpustakaan Digital</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
