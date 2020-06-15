<?php

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "web-uas");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $id_akun = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nsm = rand('100000000000', '999999999999');
    $npsn = rand('10000000', '9999999');
    $nism = htmlspecialchars($data["nism"]);
    $nisn = htmlspecialchars($data["nisn"]);
    $tanggalLahir = htmlspecialchars($data["tanggalLahir"]);
    $tempatLahir = htmlspecialchars($data["tempatLahir"]);
    $id_kelamin = htmlspecialchars($data["jenisKelamin"]);
    $id_agama = htmlspecialchars($data["agama"]);
    $id_hobi = htmlspecialchars($data["hobi"]);
    $id_cita = htmlspecialchars($data["cita"]);
    $anakKe = htmlspecialchars($data["anakKe"]);
    $jumlahSaudara = htmlspecialchars($data["jumlahSaudara"]);
    $tanggalMasuk = date('d-m-Y');
    $id_js = htmlspecialchars($data["jenjang_sekolah"]);
    $id_tk = htmlspecialchars($data["tingkatKelas"]);
    $id_as = htmlspecialchars($data["AsalSekolah"]);
    $id_kp = htmlspecialchars($data["paralelKelas"]);
    $npsnAsalSekolah = htmlspecialchars($data["npsnSekolah"]);
    $nama_sekolah = htmlspecialchars($data["namaSekolah"]);
    $alamat_sekolah = htmlspecialchars($data["alamatSekolah"]);
    $nik = htmlspecialchars($data["nik"]);

    var_dump($id_as);

    $query = "INSERT INTO tb_utama
             VALUES
            ('',
            '$id_akun',
            '$id_kelamin',
            '$id_js',
            '$id_as',
            '$id_tk',
            '$id_kp',            
            '$id_hobi',
            '$id_agama',
            '$id_cita',
            '$nama_sekolah',
            '$alamat_sekolah',
            '2020',
            '$nsm',
            '$npsn',
            'Siswa Baru',
            '$nama',
            '$anakKe',
            '$nism',    
            '$nisn',
            '$tanggalMasuk',
            '$nik',
            '$tanggalLahir',
            '$tempatLahir',
            '$jumlahSaudara',
            '$npsnAsalSekolah'
            )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($data)
{
    global $conn;
    $query = "DELETE FROM tb_utama where id_akun=$data";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM tb_utama,tb_akun 
    WHERE 
    username LIKE '%$keyword%' OR
    tanggal_pembuatan LIKE '%$keyword%' OR
    nama_siswa LIKE '%$keyword%' OR
    nama_sekolah LIKE '%$keyword%' OR
    nisn LIKE '%$keyword%'
    ";

    return query($query);
}


function registrasi($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //apakah user sudah ada atau belum di database 
    $query = "SELECT username FROM tb_akun WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
        alert('konfirmasi data sudah ada')
        </script>
    ";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "
            <script>
            alert('konfirmasi password tidak sesuai')
            </script>
        ";
        return false;
    }

    //enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan data baru 
    $user = "user";
    $tanggal_registrasi = date('d-m-Y');
    $query = "INSERT INTO tb_akun VALUES ('','$username','$password','$user','$tanggal_registrasi')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
