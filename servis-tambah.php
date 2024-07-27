<?php

// koneksi ke Database
$conn = mysqli_connect('localhost', 'root', '', 'servisac');

// apabila tombol simpan di klik maka lakukan didalam percabanngan dibawah ini
if (isset($_POST['simpan'])) {

    // Panggil semua name pada form dibawah
    $tgl = $_POST['tgl'];
    $id_jenis = $_POST['id_jenis'];
    $id_user = $_POST['id_user'];
    $id_ruang = $_POST['id_ruang'];
    $catatan = $_POST['catatan'];
    $status = $_POST['status'];

    // Fungsi/Query tambah data
    $simpan = mysqli_query($conn, "INSERT INTO tbl_servis VALUES(NULL, '$tgl', '$id_jenis', '$id_user', '$id_ruang', '$catatan', '$status')");

    // apabila query diatas jalan maka arahkan ke halaman servis
    if ($simpan) {
        header("Location: servis.php");
    } else {
        // apabila query diatas gagal maka arahkan ke halaman servis-tambah
        header("Location: servis-tambah.php");
    }

}
$result_jenis = mysqli_query($conn, "SELECT * FROM tbl_jenis");
$result_user = mysqli_query($conn, "SELECT * FROM tbl_user");
$result_ruang = mysqli_query($conn, "SELECT * FROM tbl_ruang");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Servis AC</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bgujun-birumuda">
    <div class="container mt-3">
        <div class="row">
            <div class="col bg-info text-center">
                <h1 class="mt-3">Aplilasi Servis AC</h1>
                <p>Aplikasi Pengelolaan Data Servis AC Wilayah Banjarmasin</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 bg-warning">
                <h3>Menu Utama</h3>
                <hr>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="user.php">Data User</a></li>
                    <li><a href="jenis.php">Data Jenis</a></li>
                    <li><a href="ruang.php">Data Ruang</a></li>
                    <li><a href="servis.php">Data Servis</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <div class="col-lg-9 bg-light">
                <div class="form">
                    <h2 class="mt-2">Tambah Data</h2>
                    <p>Silahkan menambahkan data Data Servis baru pada Form dibawah ini</p>
                    <hr>
                    <form method="post" class="mb-5">
                        <div class="mt-2">
                            <label for="tgl">Tanggal :</label>
                            <input type="date" name="tgl" id="tgl" class="form-control" required>
                        </div>
                        <div class="mt-2">
                            <select name="id_jenis" id="id_jenis" class="form-select"
                                aria-label="Default select example">
                                <option> - Jenis - </option>
                                <?php
                                while ($row_jenis = mysqli_fetch_assoc($result_jenis)) {
                                    echo "<option value=" . $row_jenis['id_jenis'] . ">" . $row_jenis['nm_jenis'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mt-2">
                            <select name="id_user" id="id_user" class="form-select" aria-label="Default select example">
                                <option> - Teknisi - </option>
                                <?php
                                while ($row_user = mysqli_fetch_assoc($result_user)) {
                                    echo "<option value=" . $row_user['id_user'] . ">" . $row_user['nm_user'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mt-2">
                            <select name="id_ruang" id="id_ruang" class="form-select"
                                aria-label="Default select example">
                                <option> - Ruang - </option>
                                <?php
                                while ($row_ruang = mysqli_fetch_assoc($result_ruang)) {
                                    echo "<option value=" . $row_ruang['id_ruang'] . ">" . $row_ruang['nm_ruang'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="catatan">Catatan :</label>
                            <textarea name="catatan" id="catatan" class="form-control" required></textarea>
                        </div>
                        <div class="mt-2">
                            <label for="status">Status :</label>
                            <label for="status"><input type="radio" value="0" name="status" required>Pending</label>
                            <label for="status"><input type="radio" value="1" name="status" required>Selesai</label>
                            <label for="status"><input type="radio" value="2" name="status" required>Tidak bisa diperbaiki</label>
                        </div>
                        <div class="mt-2">
                            <input type="submit" name="simpan" id="simpan" class="btn btn-primary" value="Simpan">
                            <button type="reset" name="batal" id="cancel" class="btn btn-secondary">Reset</button>
                            <a href="servis.php" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col bg-primary text-center">
                <p class="text-light">Copyright &copy; Muhammad Junaidi | 2024</p>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>