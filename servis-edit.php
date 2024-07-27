<?php

$id_servis = $_GET['id'];

// koneksi ke Database
$conn = mysqli_connect('localhost', 'root', '', 'servisac');

// apabila tombol ubah di klik maka lakukan didalam percabanngan dibawah ini
if (isset($_POST['ubah'])) {
    // Panggil semua name pada form dibawah
    $id_servis = $_POST['id'];
    $tgl = $_POST['tgl'];
    $id_jenis = $_POST['id_jenis'];
    $id_user = $_POST['id_user'];
    $id_ruang = $_POST['id_ruang'];
    $catatan = $_POST['catatan'];
    $status = $_POST['status'];

    // Fungsi/Query edit data
    $ubah = mysqli_query($conn, "UPDATE tbl_servis SET tgl='$tgl', id_jenis='$id_jenis', id_user='$id_user', id_ruang='$id_ruang', catatan='$catatan', status='$status' WHERE id_servis=$id_servis");

    // apabila query diatas jalan maka arahkan ke halaman servis
    if ($ubah) {
        header("Location: servis.php");
    } else {
        // apabila query diatas gagal maka arahkan ke halaman servis-edit
        header("Location: servis-edit.php");
    }

}

$result_servis = mysqli_query($conn, "SELECT * FROM tbl_servis WHERE id_servis=$id_servis");
$result_jenis = mysqli_query($conn, "SELECT * FROM tbl_jenis");
$result_user = mysqli_query($conn, "SELECT * FROM tbl_user");
$result_ruang = mysqli_query($conn, "SELECT * FROM tbl_ruang");

$row_servis = mysqli_fetch_assoc($result_servis);
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
                    <h2 class="mt-2">Edit Data</h2>
                    <p>Silahkan mengedit data Data Servis baru pada Form dibawah ini</p>
                    <hr>
                    <form method="post" class="mb-5">
                        <input type="hidden" name="id" value="<?= $id_servis ?>">
                        <div class="mt-2">
                            <label for="tgl">Tanggal :</label>
                            <input type="date" name="tgl" id="tgl" class="form-control"
                                value="<?= $row_servis['tgl'] ?>" required>
                        </div>
                        <div class="mt-2">
                            <select name="id_jenis" id="id_jenis" class="form-select"
                                aria-label="Default select example">
                                <option> - Jenis - </option>
                                <?php
                                while ($row_jenis = mysqli_fetch_assoc($result_jenis)) {
                                    echo "<option value='" . $row_jenis['id_jenis'] . "' " . (($row_servis['id_jenis'] == $row_jenis['id_jenis']) ? 'selected' : '') . ">" . $row_jenis['nm_jenis'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mt-2">
                            <select name="id_user" id="id_user" class="form-select" aria-label="Default select example">
                                <option> - Teknisi - </option>
                                <?php
                                while ($row_user = mysqli_fetch_assoc($result_user)) {
                                    echo "<option value='" . $row_user['id_user'] . "' " . (($row_servis['id_user'] == $row_user['id_user']) ? 'selected' : '') . ">" . $row_user['nm_user'] . "</option>";
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
                                    echo "<option value='" . $row_ruang['id_ruang'] . "' " . (($row_servis['id_ruang'] == $row_ruang['id_ruang']) ? 'selected' : '') . ">" . $row_ruang['nm_ruang'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="catatan">Catatan :</label>
                            <textarea type="text" name="catatan" id="catatan" class="form-control"
                                required><?= $row_servis['catatan'] ?></textarea>
                        </div>
                        <div class="mt-2">
                            <label for="status">Status :</label>
                            <label for="status"><input type="radio" value="0" name="status" <?= $row_servis['status'] == 0 ? 'checked' : '' ?> required>Pending</label>
                            <label for="status"><input type="radio" value="1" name="status" <?= $row_servis['status'] == 1 ? 'checked' : '' ?> required>Selesai</label>
                            <label for="status"><input type="radio" value="2" name="status" <?= $row_servis['status'] == 2 ? 'checked' : '' ?> required>Tidak bisa diperbaiki</label>
                        </div>
                        <div class="mt-2">
                            <input type="submit" name="ubah" id="ubah" class="btn btn-primary" value="Ubah">
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