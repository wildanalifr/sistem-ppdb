<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.html");
  exit;
}

include 'functions.php';

$id = $_SESSION["id"];

$jenisKelaminS = query("SELECT * FROM tb_jeniskelamin");
$agamaS = query("SELECT * FROM tb_agama");
$hobiS = query("SELECT * FROM tb_hobi");
$citaS = query("SELECT * FROM tb_cita");
$jenjangSekolahS = query("SELECT * FROM tb_jenjangSekolah");

$id = $_SESSION["id"];

if (isset($_POST["submit"])) {
  if (tambah($_POST) > 0) {
    echo "
      <script>
          alert('data berhasil ditambahkan');
          document.location.href = 'user-dashboard.php';
      </script>
      ";
  } else {
    echo "
      <script>
          alert('data gagal ditambahkan');          
      </script>
      ";
    echo mysqli_error($conn);
  }
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
          <a class="nav-link" href="#">Home</a>
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
    <div class="container my-5 pt-5 ">
      <div class="row">
        <h3><i class="fas fa-users"></i> Silahkan Isi data dalam form dibawah ini</h3>
      </div>
      <div class="row">
        <form method="POST">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <!-- satu   -->
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">Nama Siswa </label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">NISM</label>
              <input type="text" class="form-control" name="nism" id="nism" placeholder="NISM" required>
            </div>
          </div>
          <!-- dua   -->
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">NISN</label>
              <input type="text" class="form-control" name="nisn" id="nisn" placeholder="NISN" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tanggalLahir" id="tanggalLahir" placeholder="Tanggal Lahir" required>
            </div>
          </div>
          <!-- tiga   -->
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">Tempat Tanggal Lahir</label>
              <input type="text" class="form-control" name="tempatLahir" id="tempatLahir" placeholder="Tempat Tanggal Lahir" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Jenis Kelamin</label>
              <select name="jenisKelamin" class="custom-select">
                <option disabled="disabled" selected="selected">Jenis Kelamin</option>
                <?php foreach ($jenisKelaminS as $jenisKelamin) : ?>
                  <option value="<?= $jenisKelamin['id_kelamin']; ?>"><?= $jenisKelamin['jenis_kelamin']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <!-- empat   -->
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="agama">Agama </label>
              <select name="agama" class="custom-select">
                <option disabled="disabled" selected="selected">Agama</option>
                <?php foreach ($agamaS as $agama) : ?>
                  <option value="<?= $agama['id_agama']; ?>"><?= $agama['nama_agama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Hobi</label>
              <select name="hobi" class="custom-select">
                <option disabled="disabled" selected="selected">Hobi</option>
                <?php foreach ($hobiS as $hobi) : ?>
                  <option value="<?= $hobi['id_hobi']; ?>"><?= $hobi['nama_hobi']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <!-- lima   -->
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">Cita-cita</label>
              <select name="cita" class="custom-select">
                <option disabled="disabled" selected="selected">Cita-cita</option>
                <?php foreach ($citaS as $cita) : ?>
                  <option value="<?= $cita['id_cita']; ?>"><?= $cita['nama_cita']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Anak ke</label>
              <input type="text" class="form-control" name="anakKe" id="anakKe" placeholder="Anak ke" required>
            </div>
          </div>
          <!-- enam   -->
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">Jumlah Saudara</label>
              <input type="text" class="form-control" name="jumlahSaudara" id="jumlahSaudara" placeholder="Jumlah Saudara" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">NIK</label>
              <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" required>
            </div>
          </div>
          <!-- tujuh   -->
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">Jenjang Sekolah</label>
              <select name="jenjang_sekolah" id="jenjangsekolah" class="custom-select">
                <option disabled="disabled" selected="selected">Jenjang Sekolah</option>
                <?php foreach ($jenjangSekolahS as $jenjangSekolah) : ?>
                  <option value="<?= $jenjangSekolah['id_js']; ?>"><?= $jenjangSekolah['nama_js']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">Jenis Asal Sekolah</label>
              <select name="AsalSekolah" id="jenisasalsekolah" class="custom-select">
                <option disabled="disabled" selected="selected">Jenis Asal Sekolah</option>
                <option value="">Pilih Paralel Sekolah dahulu</option>
              </select>
            </div>
          </div>
          <!-- delapan   -->
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Tingkat Kelas</label>
              <select name="tingkatKelas" id="tingkatkelas" class="custom-select">
                <option disabled="disabled" selected="selected">Tingkat Kelas</option>
                <option value="">Pilih Jenjang Sekolah dahulu</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Paralel Kelas</label>
              <select name="paralelKelas" id="paralelkelas" class="custom-select">
                <option disabled="disabled" selected="selected">Paralel Kelas</option>
                <option value="">Pilih Tingkat Sekolah dahulu</option>
              </select>
            </div>
          </div>
          <!-- sembilan   -->
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">NPSN Asal Sekolah</label>
              <input type="text" class="form-control" name="npsnSekolah" id="npsnSekolah" placeholder="NPSN Asal Sekolah" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Nama Asal Sekolah</label>
              <input type="text" class="form-control" name="namaSekolah" id="namaSekolah" placeholder="Nama Asal Sekolah" required>
            </div>
          </div>
          <!-- sepuluh   -->
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">Alamat Asal Sekolah</label>
              <input type="text" class="form-control" name="alamatSekolah" id="alamatSekolah" placeholder="Alamat Asal Sekolah" required>
            </div>
          </div>

          <button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
        </form>

      </div>

    </div>
  </section>

  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>
    $('#jenjangsekolah').on('change', function() {
      let id_jenjang_sekolah = $(this).val()

      $.ajax({
        url: "get_jenis_asal_sekolah.php",
        type: "POST",
        data: {
          id_js: id_jenjang_sekolah
        },
        success: function(data) {
          let databaru = JSON.parse(data)
          // console.log(databaru)
          $('#jenisasalsekolah').empty()
          $('#tingkatkelas').empty()
          $('#tingkatkelas').append($("<option></option>")
            .attr("selected", true)
            .attr("disabled", 'disabled')
            .text("--- Tingkat Kelas ---"))
          for (let index = 0; index < databaru.jenisasalsekolah.length; index++) {
            $('#jenisasalsekolah').append($("<option></option>")
              .attr("value", databaru.jenisasalsekolah[index][0])
              .text(databaru.jenisasalsekolah[index][1]));
          }

          for (let index = 0; index < databaru.tingkatkelas.length; index++) {
            $('#tingkatkelas').append($("<option></option>")
              .attr("value", databaru.tingkatkelas[index][0])
              .text(databaru.tingkatkelas[index][1]));
          }
        }
      })
    })

    $('#tingkatkelas').on('change', function() {
      // alert("ok")
      let id_tingkat_kelas = $(this).val()
      $.ajax({
        url: "get_kelas_pararel.php",
        type: "POST",
        data: {
          id_tk: id_tingkat_kelas
        },
        success: function(data) {
          let databaru = JSON.parse(data)
          console.log(databaru)
          $('#paralelkelas').empty()
          $('#paralelkelas').append($("<option></option>")
            .attr("selected", true)
            .attr("disabled", true)
            .text("--- Kelas Paralel ---"));
          databaru.forEach(element => {
            $('#paralelkelas').append($("<option></option>")
              .attr("value", element[0])
              .text(element[1]));
          })
        }
      })
    })
  </script>
</body>

</html>