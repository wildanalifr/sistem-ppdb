<?php
session_start();

include 'functions.php';

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM tb_akun WHERE username = '$username'");

  //cek username 
  if (mysqli_num_rows($result) === 1) {

    //cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      if ($row["level"] === "admin") {
        //set session
        $_SESSION["login"] = true;
        header("Location: admin-dashboard.php");
        exit;
      } else {
        //set session
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id_akun"];
        header("Location: user-dashboard.php");
        exit;
      }
    } else {
      $tidakCocok = true;
    }
  }

  $tidakAda = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/custom.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css" />
</head>

<body>
  <div class="container login">
    <h4 class="text-center">FORM LOGIN</h4>
    <hr />

    <?php if (isset($tidakCocok)) : ?>
      <p class="text-center text-danger">Username/password salah</p>
    <?php elseif (isset($tidakAda)) : ?>
      <p class="text-center text-danger">Anda belum registrasi</p>
    <?php endif; ?>

    <form action="" method="POST">
      <div class="form-group">
        <label for="">Username</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>
          <input type="text" name="username" class="form-control" placeholder="Masukkan Username anda" />
        </div>
      </div>

      <div class="form-group">
        <label for="">Password</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-unlock-alt"></i>
            </div>
          </div>
          <input type="password" name="password" class="form-control" placeholder="Masukkan Password anda" />
        </div>
      </div>

      <button type="submit" name="login" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-danger">Reset</button>

      <div class="pertanyaan text-center my-4">
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>