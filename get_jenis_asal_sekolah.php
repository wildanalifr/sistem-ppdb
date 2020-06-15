<?php

include "koneksi.php";

$id_jenjang_asal_sekolah = $_POST['id_js'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_asalsekolah WHERE id_js={$id_jenjang_asal_sekolah}");

$data = array();
$no = 0;
while ($result = mysqli_fetch_object($query)) {
    $data["jenisasalsekolah"][$no] = [$result->id_as, $result->asal_sekolah];
    $no++;
}

$query = mysqli_query($koneksi, "SELECT * FROM tb_tingkatkelas WHERE id_js={$id_jenjang_asal_sekolah}");

$no = 0;
while ($result = mysqli_fetch_object($query)) {
    $data["tingkatkelas"][$no] = [$result->id_tk, $result->tingkat_kelas];
    $no++;
}

echo json_encode($data);
