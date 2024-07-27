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
          <li><a href="jenis.php">Data Lokasi</a></li>
          <li><a href="ruang.php">Data Lokasi</a></li>
          <li><a href="servis.php">Data Servis</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
      <div class="col-lg-9 bg-light">
        <div class="data">
        <h2 class="mt-2">Judul Content</h2>
        <p>Silahkan mengelola kontent dibawah ini</p>
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
        <hr>
        <table class="table">
          <tbody class="table-primary">
            <tr>
              <td>No</td>
              <td>Nama</td>
              <td>Lokasi</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Ucup</td>
              <td>Planet Nebula</td>
            </tr>
          </tbody>
        </table>
        </div>
        <div class="form">
          <h2 class="mt-2">Tambah Data</h2>
          <hr>
          <form action="" method="post" class="mb-5">
            <div class="mt-2">
              <label for="nama">Nama :</label>
              <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mt-2">
              <label for="lokasi">Lokasi :</label>
              <select name="lokasi" id="lokasi" class="form-control">
                <option value="">-- Pilih Lokasi --</option>
                <option value="1">Satu</option>
                <option value="2">Dua</option>
              </select>
            </div>
            <div class="mt-2">
              <label for="alamat">Alamat :</label>
              <textarea type="text" name="alamat" id="alamat" class="form-control" required></textarea>
            </div>
            <div class="mt-2">
              <button type="submit" name="simpan" id="simpan" class="btn btn-primary">Simpan</button>
              <button type="reset" name="batal" id="cancel" class="btn btn-secondary">Cancel</button>
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