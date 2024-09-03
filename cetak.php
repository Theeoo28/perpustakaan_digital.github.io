<h2 align="center">Laporan Peminjaman Buku</h2>
<table border="1" cellspacing="0" cellspadding="5" width="100%">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status Peminjaman</th>
        </tr>
        <?php
        include 'config.php';
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT user.nama_lengkap, buku.judul, peminjaman.tanggal_peminjaman, 
                        peminjaman.tanggal_pengembalian, peminjaman.status_peminjaman FROM peminjaman  LEFT JOIN user 
                        ON user.user_id = peminjaman.user_id LEFT JOIN buku ON buku.buku_id = peminjaman.buku_id");


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
                    <?php echo isset($data['tanggal_peminjaman']) ? $data['tanggal_peminjaman'] : ''; ?>
                </td>
                <td>
                    <?php echo isset($data['tanggal_pengembalian']) ? $data['tanggal_pengembalian'] : ''; ?>
                </td>
                <td>
                    <?php echo isset($data['status_peminjaman']) ? $data['status_peminjaman'] : ''; ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <script>
        window.onload = function () {
            window.print();
            setTimeout(function () {
                window.close();
            }, 500); 
        }
    </script>