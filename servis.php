<?php
include_once __DIR__ . '/Database/DB.php';
DB::setUp();
$conn = DB::connect();

$result_servis = mysqli_query($conn, <<<SQL
SELECT 
  s.id_servis, 
  s.tgl, 
  j.nm_jenis, 
  u.nm_user, 
  r.nm_ruang, 
  s.catatan, 
  s.status  
FROM tbl_servis AS s
JOIN tbl_user AS u ON (s.id_user = u.id_user)
JOIN tbl_ruang AS r ON (s.id_ruang = r.id_ruang)
JOIN tbl_jenis AS j ON (s.id_jenis = j.id_jenis)
SQL);
$jml_servis = mysqli_num_rows($result_servis);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data servis</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body class="bgujun-birumuda">
  <div class="container mt-3">
    <div class="row">
      <div class="col bg-info text-center">
        <h1 class="mt-3">Data servis</h1>
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
          <h2 class="mt-2">Data Servis</h2>
          <p>Silahkan mengelola data Servis dibawah ini</p>
          <a href="servis-tambah.php" class="btn btn-primary">Tambah Data</a>
          <hr>
          <?php if ($jml_servis == 0) { ?>
            <div class="alert alert-warning" role="warning">
              Data Masih Kosong...!
            </div>
          <?php } else { ?>

          <?php } ?>
          <table class="table">
            <thead class="table-primary">
              <tr>
                <th>Aksi</th>
                <th>Tanggal</th>
                <th>Jenis Servis</th>
                <th>Teknisi</th>
                <th>Ruang</th>
                <th>Catatan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row_servis = mysqli_fetch_assoc($result_servis)) {
                ?>
                <tr>
                  <td>
                    <a href="servis-edit.php?id=<?php echo $row_servis['id_servis'] ?>"
                      class="btn btn-sm btn-warning">Edit</a>
                    <a href="servis-hapus.php?id=<?php echo $row_servis['id_servis'] ?>"
                      class="btn btn-sm btn-danger">Hapus</a>
                  </td>
                  <td><?php echo $row_servis['tgl'] ?></td>
                  <td><?php echo $row_servis['nm_jenis'] ?></td>
                  <td><?php echo $row_servis['nm_user'] ?></td>
                  <td><?php echo $row_servis['nm_ruang'] ?></td>
                  <td><?php echo $row_servis['catatan'] ?></td>
                  <td><?php
                  if ($row_servis['status'] == 0) echo 'Pending';
                  else if ($row_servis['status'] == 1) echo 'Selesai';
                  else if ($row_servis['status'] == 2) echo 'Tidak bisa diperbaiki';
                  ?></td>
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