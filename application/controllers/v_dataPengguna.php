<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/css/index.css'); ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
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
								<li> <a href="<?= base_url('index.php/search/tampil_pengguna')?>">User</a> </li>
								<li> <a href="<?= base_url('index.php/search/tampil_permohonan')?>">Konfirmasi</a> </li>
								<li> <a href="<?= base_url('index.php/c_permohonan/logout')?>">Logout</a> </li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="topNav">
				<h1>Form Permohonan</h1>
			</div>
			<div class="formPermohonan">
				<table class="tCss">
					<thead>
						<tr>
							<th>No</th>
							<th>NIP</th>
							<th>UserName</th>
							<th>Password</th>
							<th>Otoritas</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1;
							foreach($data as $Pengguna):?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $Pengguna['nip']; ?></td>
							<td><?php echo $Pengguna['username']; ?></td>
							<td><?php echo $Pengguna['password']; ?></td>
							<td><?php echo $Pengguna['otoritas']; ?></td>
						</tr>
						<?php $no++; endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>
