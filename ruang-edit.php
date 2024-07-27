<?php

// koneksi ke Database
$conn = mysqli_connect('localhost', 'root', '', 'servisac');
$id_ruang = $_GET['id'];

if (isset($_POST['ubah'])) {
    $nm_ruang = $_POST['nm_ruang'];

    $edit = mysqli_query($conn, "UPDATE tbl_ruang SET nm_ruang='$nm_ruang' WHERE id_ruang=$id_ruang");

    if ($edit) {
        header("Location: ruang.php");
    } else {
        header("Location: ruang-edit.php");
    }
}

$result_ruang = mysqli_query($conn, "SELECT * FROM tbl_ruang WHERE id_ruang=$id_ruang");
$row_ruang = mysqli_fetch_assoc($result_ruang);
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
                    <p>Silahkan mengedit Data Ruang pada Form dibawah ini</p>
                    <hr>
                    <form method="post" class="mb-5">
                        <div class="mt-2">
                            <label for="nm_ruang">Nama :</label>
                            <input type="text" name="nm_ruang" id="nm_ruang" class="form-control"
                                value="<?= $row_ruang['nm_ruang'] ?>" required>
                        </div>
                        <div class="mt-2">
                            <input type="submit" name="ubah" id="ubah" class="btn btn-primary" value="Ubah">
                            <button type="reset" name="batal" id="cancel" class="btn btn-secondary">Reset</button>
                            <a href="ruang.php" class="btn btn-danger">Batal</a>
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