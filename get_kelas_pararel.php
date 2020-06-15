<?php

include "koneksi.php";

$id_tingkat_kelas = $_POST['id_tk'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_kelasparalel WHERE id_tk={$id_tingkat_kelas}");

$data = array();
while ($result = mysqli_fetch_object($query)) {
    array_push($data, [$result->id_tk, $result->kelas_paralel]);
}

echo json_encode($data);
