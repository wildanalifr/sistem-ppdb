<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.html");
  exit;
}

include 'functions.php';

$dataS = query("SELECT * FROM tb_utama");

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
    <a class="navbar-brand" href="#">Admin</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Menu
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="admin-dashboard.php">Dashboard</a>
            <a class="dropdown-item" href="admin-daftar-akun.php">Daftar Akun</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
          Search
        </button>
      </form>

      <div class="icon ml-4">
        <h4>
          <a href="logout.php"><i class="fas fa-sign-out-alt" data-toggle="tooltip" title="Keluar"></i></a>
        </h4>
      </div>
    </div>
  </nav>

  <section class="section-daftar-akun mt-5 ml-5 mr-5 pt-5">
    <div class="row">
      <h3>Daftar Pendaftar</h3>
      <form action="export2.php" method="POST">
        <input type="submit" class="btn btn-success ml-5" value="Export to Excel" name="cetak_form">
      </form>
    </div>
    <div class="row">
      <table class="table table-hover col-8 my-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">NISN</th>
            <th scope="col">Asal Sekolah</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($dataS as $data) : ?>
            <tr class="success">
              <th scope="row"><?= $i; ?></th>
              <td><?= $data["nama_siswa"]; ?></td>
              <td><?= $data["nisn"]; ?></td>
              <td><?= $data["nama_sekolah"]; ?></td>
              <td>
                <a href="admin-detail-pendaftar.php?id=<?= $data["id_akun"]; ?>">Detail</a> |
                <a href="hapus.php?id=<?= $data["id_akun"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>