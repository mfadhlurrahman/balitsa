<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/css/index.css'); ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<title></title>
<style>
body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
}

main {
    flex: 1 0 auto;
}
.topnav {
	float: right;
overflow: hidden;
height: 65px;

}

		/* Change color on hover */
.topnav a {
    float: left;
    display: block;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #ccc;
    color: black;
}
/* Create two unequal columns that floats next to each other */
/* Left column */

	</style>
<body>
	<div id="divWrapper">
		<div class="sideBar">
			<div class="sideBarFixed">
				<div class="topNav">
					<h1>Balitsa</h1>
				</div>
				<div class="sideNav">
					<nav>
						<div class="sideList">
							<ul>
								<li> <a href="<?= base_url('index.php/search/tampil_admin')?>">Home</a> </li>
								<li> <a href="<?= base_url('index.php/search/tampil_data_peneliti')?>">Peneliti</a> </li>
								<li> <a href="<?= base_url('index.php/search/tampil_pengguna')?>">User</a> </li>
								<li> <a href="<?= base_url('index.php/search/tampil_lahan')?>">Lahan</a> </li>
								<li> <a href="<?= base_url('index.php/search/tampil_aula')?>">Aula</a> </li>
								<li> <a href="<?= base_url('index.php/search/tampil_permohonan')?>">Konfirmasi</a> </li>
								<li> <a href="<?= base_url('index.php/search/data_peminjaman_admin')?>">Konfirmasi Peminjaman Aula</a> </li>
								<li> <a href="<?= base_url('index.php/C_logout/logout')?>">Logout</a> </li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="topNav">
				<h1>Data Peminjaman</h1>
			</div>
			<div class="">

				<div class="formPermohonan">
					<table class="tCss">
						<thead>
							<tr>
								<th>No</th>
								<th>No Peminjaman</th>
								<th>NIP</th>
								<th>Penanggung Jawab</th>
								<th>Kode Kegiatan</th>
								<th>Judul Kegiatan</th>
								<th>Nama Aula</th>
								<th>Waktu Kegiatan</th>
								<th>Jumlah</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;
								foreach($peminjaman as $pmj):?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?= $pmj->no_peminjaman?></td>
								<td><?= $pmj->nip?></td>
								<td><?= $pmj->penanggung_jawab?></td>
								<td><?= $pmj->kd_kegiatan?></td>
								<td><?= $pmj->judul_kegiatan?></td>
								<td><?= $pmj->nm_aula?></td>
								<td><?= $pmj->waktu_kegiatan?></td>
								<td><?= $pmj->jumlah?></td>
								<td><?= $pmj->keterangan?></td>
								 <td>
								<a  href="<?= base_url('index.php/search/edit_peminjaman/?kode='.$pmj->no_peminjaman); ?>">Edit </a>||<a  href="<?= base_url('index.php/search/hapus_peminjaman/?kode='.$pmj->no_peminjaman); ?>"> Hapus</a>
							</td>
							</tr>
							<?php $no++; endforeach; ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
