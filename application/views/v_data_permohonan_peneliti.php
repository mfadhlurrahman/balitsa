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
								<li> <a href="<?= base_url('index.php/search/tampil_peneliti')?>">Home</a> </li>
								<li> <a href="<?= base_url('index.php/search/tampil')?>">Permohonan</a> </li>
								<li> <a href="<?= base_url('index.php/search/data_permohonan_user')?>">History Permohonan</a> </li>
								<li> <a href="<?= base_url('index.php/search/tampil_peminjaman')?>">Peminjaman Aula</a> </li>
								<li> <a href="<?= base_url('index.php/search/data_peminjaman')?>">History Peminjaman Aula</a> </li>
								<li> <a href="<?= base_url('index.php/C_logout/logout')?>">Logout</a> </li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="topNav">
				<h1>Data Permohonan</h1>
			</div>
			<div class="">

				<div class="formPermohonan">
					<table class="tCss">
						<thead>
							<tr>
								<th>No</th>
								<th>No permohonan</th>
								<th>NIP</th>
								<th>Nama Peneliti</th>
								<th>Judul Kegitan</th>
								<th>Komuditas</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;
								foreach($laporan as $permohonan):?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?= $permohonan->no_permohonan?></td>
								<td><?= $permohonan->nip?></td>
								<td><?= $permohonan->nm_peneliti?></td>
								<td><?= $permohonan->judul_kegiatan?></td>
								<td><?= $permohonan->komoditas?></td>
								<td><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="get_data(<?= $permohonan->no_permohonan ?>)"><i class="glyphicon glyphicon-eye-open"></i> Detail</a></td>
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
