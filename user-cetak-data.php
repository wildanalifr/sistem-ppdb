<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

include 'functions.php';

$id = $_SESSION["id"];

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

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table border="1" cellspacing="1" cellpadding="10">';

$html .= '<tr>
                <td>Nama Siswa</td>
                <td>' . $dataS["nama_siswa"] . '</td>
            </tr>
            <tr>
                <td>NSM</td>
                <td>' . $dataS["nism"] . '</td>
            </tr>
            <tr>
                <td>NPSN</td>
                <td>' . $dataS["npsn"] . '</td>
            </tr>
            <tr>
                <td>NISM</td>
                <td>' . $dataS["nism"] . '</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>' . $dataS["nisn"] . '</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>' . $dataS["tanggal_lahir"] . '</td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>' . $dataS["tempat_lahir"] . '</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>' . $dataS["jenis_kelamin"] . '</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>' . $dataS["nama_agama"] . '</td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>' . $dataS["nama_hobi"] . '</td>
            </tr>
            <tr>
                <td>Cita-cita</td>
                <td>' . $dataS["nama_cita"] . '</td>
            </tr>
            <tr>
                <td>Anak ke</td>
                <td>' . $dataS["anak_ke"] . '</td>
            </tr>
            <tr>
                <td>Jumlah Saudara</td>
                <td>' . $dataS["jumlah_saudara"] . '</td>
            </tr>
            <tr>
                <td>Tanggal Masuk</td>
                <td>' . $dataS["tanggal_masuk"] . '</td>
            </tr>
            <tr>
                <td>Jenjang Sekolah</td>
                <td>' . $dataS["nama_js"] . '</td>
            </tr>
            <tr>
                <td>Tingkat Kelas</td>
                <td>' . $dataS["tingkat_kelas"] . '</td>
            </tr>
            <tr>
                <td>Jenis Asal Sekolah</td>
                <td>' . $dataS["asal_sekolah"] . '</td>
        </tr>
        <tr>
                <td>Paralel Kelas</td>
                <td>' . $dataS["kelas_paralel"] . '</td>
            </tr>
            <tr>
                <td>NPSN Asal Sekolah</td>
                <td>' . $dataS["npsn_sekolah"] . '</td>
            </tr>
            <tr>
                <td>Nama Asal Sekolah</td>
                <td>' . $dataS["nama_sekolah"] . '</td>
            </tr>
            <tr>
                <td>Alamat Asal Sekolah</td>
                <td>' . $dataS["alamat_sekolah"] . '</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>' . $dataS["nik"] . '</td>
            </tr>';

$html .= '</table>
</body>
</html>';


$mpdf->WriteHTML($html);


$mpdf->Output('daftar-mahasiswa.pdf', 'I');
