<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.html");
  exit;
}

include 'functions.php';

$akunS = query("SELECT * FROM tb_akun");

if (isset($_POST["cari"])) {
  $akunS = cari($_POST["keyword"]);
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
      <form class="form-inline my-2 my-lg-0" method="POST">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" placeholder="masukkan keyword pencarian" autocomplete="off" />
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari">
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

  <section class="section-daftar-akun">
    <div class="container mt-5 pt-5 ">
      <div class="row">
        <h3>Daftar Akun</h3>
      </div>
      <div class="row">
        <table class="table table-hover col-8">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
              <th scope="col">Level</th>
              <th scope="col">Tanggal Registrasi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($akunS as $akun) : ?>
              <tr class="success">
                <th scope="row"><?= $i; ?></th>
                <td><?= $akun["username"]; ?></td>
                <td><?= $akun["level"]; ?></td>
                <td><?= $akun["tanggal_pembuatan"]; ?></td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>