<body>
	<style type="text/css">
		body {
			font-family: sans-serif;
			overflow-y: auto;
			overflow-x: scroll;
		}

		table {
			margin: 20px auto;
			border-collapse: collapse;
			overflow-y: auto;
			overflow-x: scroll;
		}

		table th {
			background-color: #eaeaea;
			height: 30px;
		}

		table th,
		table td {
			text-align: center;
			border: 1px solid #3c3c3c;
			padding: 3px 8px;
		}
	</style>
	<table border="1">
		<tr>
			<th scope="col">#</th>
			<th scope="col">NSM</th>
			<th scope="col">NPSN</th>
			<th scope="col">Status Siswa</th>
			<th scope="col">Nama Siswa</th>
			<th scope="col">NISM</th>
			<th scope="col">NISN</th>
			<th scope="col">NIK</th>
			<th scope="col">Tempat Lahir</th>
			<th scope="col">Tanggal Lahir</th>
			<th scope="col">Jenis Kelamin</th>
			<th scope="col">Agama</th>
			<th scope="col">Hobi</th>
			<th scope="col">Cita-cita</th>
			<th scope="col">Anak Ke</th>
			<th scope="col">Jumlah Saudara</th>
			<th scope="col">Tanggal Masuk</th>
			<th scope="col">Tahun Ajaran</th>
			<th scope="col">Tingkat Kelas</th>
			<th scope="col">Kelas Paralel</th>
			<th scope="col">Jenis Asal Sekolah</th>
			<th scope="col">NPSN Asal Sekolah</th>
			<th scope="col">Nama Sekolah Asal</th>
			<th scope="col">Alamat Sekolah Asal</th>
		</tr>
		<?php
		include "functions.php";

		$dataS = query("SELECT * FROM tb_utama,tb_jeniskelamin,tb_agama,tb_hobi,tb_cita,tb_tingkatkelas,tb_kelasparalel,tb_asalsekolah 
				WHERE 
				tb_jeniskelamin.id_kelamin = tb_utama.id_kelamin AND
				tb_agama.id_agama = tb_utama.id_agama AND 
				tb_hobi.id_hobi = tb_utama.id_hobi AND
				tb_cita.id_cita = tb_utama.id_cita AND
				tb_tingkatkelas.id_tk = tb_utama.id_tk AND
				tb_kelasparalel.id_kp = tb_utama.id_kp AND
				tb_asalsekolah.id_as = tb_utama.id_as");
		$i = 1;
		foreach ($dataS as $data) { ?>
			<tr style='font-size: 13px;'>
				<td><?= $i++; ?></td>
				<td><?= $data["nsm"]; ?></td>
				<td><?= $data["npsn"]; ?></td>
				<td><?= $data["status_siswa"]; ?></td>
				<td><?= $data["nama_siswa"]; ?></td>
				<td><?= $data["nism"]; ?></td>
				<td><?= $data["nisn"]; ?></td>
				<td><?= $data["nik"]; ?></td>
				<td><?= $data["tempat_lahir"]; ?></td>
				<td><?= $data["tanggal_lahir"]; ?></td>
				<td><?= $data["jenis_kelamin"]; ?></td>
				<td><?= $data["nama_agama"]; ?></td>
				<td><?= $data["nama_hobi"]; ?></td>
				<td><?= $data["nama_cita"]; ?></td>
				<td><?= $data["anak_ke"]; ?></td>
				<td><?= $data["jumlah_saudara"]; ?></td>
				<td><?= $data["tanggal_masuk"]; ?></td>
				<td><?= $data["tahun_ajaran"]; ?></td>
				<td><?= $data["tingkat_kelas"]; ?></td>
				<td><?= $data["kelas_paralel"]; ?></td>
				<td><?= $data["asal_sekolah"]; ?></td>
				<td><?= $data["npsn_sekolah"]; ?></td>
				<td><?= $data["nama_sekolah"]; ?></td>
				<td><?= $data["alamat_sekolah"]; ?></td>
			</tr>

		<?php
		}
		?>
	</table>
</body>