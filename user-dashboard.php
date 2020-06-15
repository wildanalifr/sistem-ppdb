<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.html");
  exit;
}

include 'functions.php';

$id = $_SESSION["id"];

$result = mysqli_query($conn, "SELECT * FROM tb_utama WHERE id_akun = '$id'");
$akun = query("SELECT * FROM tb_akun WHERE id_akun = '$id'")[0];

//cek username 
if (mysqli_num_rows($result) !== 1) {
  $pesan = "Anda belum mengisi data. Silahkan isi data terlebih dahulu.";
} else {
  $pesan = "Anda sudah mengisi data";
  $sudah = true;

  $dataS = query("SELECT * FROM tb_utama
INNER JOIN tb_jeniskelamin ON tb_jeniskelamin.id_kelamin = tb_utama.id_kelamin
INNER JOIN tb_agama ON tb_agama.id_agama = tb_utama.id_agama
INNER JOIN tb_hobi ON tb_hobi.id_hobi = tb_utama.id_hobi
INNER JOIN tb_cita ON tb_cita.id_cita = tb_utama.id_cita
INNER JOIN tb_tingkatkelas ON tb_tingkatkelas.id_tk = tb_utama.id_tk
INNER JOIN tb_jenjangsekolah ON tb_jenjangsekolah.id_js = tb_utama.id_js
INNER JOIN tb_kelasparalel ON tb_kelasparalel.id_kp = tb_utama.id_kp
INNER JOIN tb_asalsekolah ON tb_asalsekolah.id_as = tb_utama.id_as
INNER JOIN tb_akun ON tb_akun.id_akun = tb_utama.id_akun
WHERE tb_utama.id_akun = '$id'")[0];

  // var_dump($dataS);
  // die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Index</title>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/custom.css" />
  <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">User</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>

      <div class="icon ml-4">
        <h4>
          <a href="logout.php"><i class="fas fa-sign-out-alt" data-toggle="tooltip" title="Keluar"></i></a>
        </h4>
      </div>
    </div>
  </nav>

  <section>
    <div class="container my-5 pt-5">
      <div class="row">
        <h3><i class="fas fa-users"></i> Selamat Datang <?= $akun["username"]; ?> di PPDB Online</h3>
      </div>
      <div class="row">
        <p><?= $pesan; ?></p>
        <?php if (isset($sudah)) : ?>
          <!-- <button class="mx-5 mb-2">Cetak</button> -->
          <form action="user-cetak-data.php" method="POST">
            <input type="submit" class="btn btn-danger mb-2 ml-3" value="Cetak Data" name="cetak_form">
          </form>
          <div class="container">
            <div class="row">
              <table class="table table-striped col-8">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Nama Siswa</td>
                    <td><?= $dataS["nama_siswa"]; ?></td>
                  </tr>
                  <tr>
                    <td>NSM</td>
                    <td><?= $dataS["nism"]; ?></td>
                  </tr>
                  <tr>
                    <td>NPSN</td>
                    <td><?= $dataS["npsn"]; ?></td>
                  </tr>
                  <tr>
                    <td>NISM</td>
                    <td><?= $dataS["nism"]; ?></td>
                  </tr>
                  <tr>
                    <td>NISN</td>
                    <td><?= $dataS["nisn"]; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td><?= $dataS["tanggal_lahir"]; ?></td>
                  </tr>
                  <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td><?= $dataS["tempat_lahir"]; ?></td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td><?= $dataS["jenis_kelamin"]; ?></td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td><?= $dataS["nama_agama"]; ?></td>
                  </tr>
                  <tr>
                    <td>Hobi</td>
                    <td><?= $dataS["nama_hobi"]; ?></td>
                  </tr>
                  <tr>
                    <td>Cita-cita</td>
                    <td><?= $dataS["nama_cita"]; ?></td>
                  </tr>
                  <tr>
                    <td>Anak ke</td>
                    <td><?= $dataS["anak_ke"]; ?></td>
                  </tr>
                  <tr>
                    <td>Jumlah Saudara</td>
                    <td><?= $dataS["jumlah_saudara"]; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Masuk</td>
                    <td><?= $dataS["tanggal_masuk"]; ?></td>
                  </tr>
                  <tr>
                    <td>Jenjang Sekolah</td>
                    <td><?= $dataS["nama_js"]; ?></td>
                  </tr>
                  <tr>
                    <td>Tingkat Kelas</td>
                    <td><?= $dataS["tingkat_kelas"]; ?></td>
                  </tr>
                  <tr>
                    <td>Jenis Asal Sekolah</td>
                    <td><?= $dataS["asal_sekolah"]; ?></td>
                  </tr>
                  <tr>
                    <td>Paralel Kelas</td>
                    <td><?= $dataS["kelas_paralel"]; ?></td>
                  </tr>
                  <tr>
                    <td>NPSN Asal Sekolah</td>
                    <td><?= $dataS["npsn_sekolah"]; ?></td>
                  </tr>
                  <tr>
                    <td>Nama Asal Sekolah</td>
                    <td><?= $dataS["nama_sekolah"]; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat Asal Sekolah</td>
                    <td><?= $dataS["alamat_sekolah"]; ?></td>
                  </tr>
                  <tr>
                    <td>NIK</td>
                    <td><?= $dataS["nik"]; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        <?php else : ?>
          <p>Silahkan Klik <a href="user-form.php">disini</a> untuk mengisi data</p>
        <?php endif; ?>
      </div>

    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>