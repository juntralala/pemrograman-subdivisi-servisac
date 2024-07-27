<?php
include_once __DIR__ . '/Database/DB.php';
DB::setUp();

$conn = DB::connect();

$result_jenis = mysqli_query($conn, 'SELECT * FROM tbl_jenis');
$jml_jenis = mysqli_num_rows($result_jenis);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Jenis</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body class="bgujun-birumuda">
  <div class="container mt-3">
    <div class="row">
      <div class="col bg-info text-center">
        <h1 class="mt-3">Data jenis</h1>
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
        <div class="data">
          <h2 class="mt-2">Data Jenis</h2>
          <p>Silahkan mengelola data Jenis dibawah ini</p>
          <a href="jenis-tambah.php" class="btn btn-primary">Tambah Data</a>
          <hr>
          <?php if ($jml_jenis == 0) { ?>
            <div class="alert alert-warning" role="warning">
              Data Masih Kosong...!
            </div>
          <?php } else { ?>

          <?php } ?>
          <table class="table">
            <thead class="table-primary">
              <tr>
                <th>Aksi</th>
                <th>Nama</th>
              </tr>
            </thead>
            <tbody>
            <?php
              while($row_jenis = mysqli_fetch_assoc($result_jenis)){
            ?>
              <tr>
                <td>
                  <a href="jenis-edit.php?id=<?php echo $row_jenis['id_jenis'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="jenis-hapus.php?id=<?php echo $row_jenis['id_jenis'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
                <td><?php echo $row_jenis['nm_jenis'] ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
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