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
				<div style="float: left;width: 500px;">
					<h1>Data Lahan</h1>					
				</div>
				<div style="float: left;width: 500px;text-align: right;">
					<a href="javascript:void(0)" style="color: #fff;height: 80px;line-height: 80px;" class="kliknotif ibtn">Pemberitahuan </a> <sup style="color: #fff" class="notif">(10)</sup>			
				</div>
			</div>
			<div class="formPermohonan">
			<a href="tampil_tambah_aula" class="aBtn"> Tambah Data Aula</a>
				<table class="tCss">
					<thead>
						<tr>
              <th>No</th>
              <th>Kode Aula</th>
              <th>Nama Aula</th>
              <th>Daya Tampung</th>
              <th>Status</th>
              <th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1;
							foreach($data as $au):?>
						<tr>
              <td><?php echo $no ?></td>
              <td><?php echo $au['kd_aula']; ?></td>
              <td><?php echo $au['nm_aula']; ?></td>
              <td><?php echo $au['daya_tampung']; ?></td>
              <td><?php echo $au['status']; ?></td>
              <td>
								<a  href="<?= base_url('index.php/search/edit_aula/?kode='.$au['kd_aula']); ?>">Edit </a>||<a  href="<?= base_url('index.php/search/hapus_aula/?kode='.$au['kd_aula']); ?>"> Hapus</a>
							</td>
						</tr>
						<?php $no++; endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('asset/js/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('asset/js/bootstrap.min.js')?>"></script>
<script type="text/javascript">
			$(document).ready(function(){
				function get_api(){
					$.ajax({
						url:"http://localhost/balitsaa/index.php/api",
						method:"GET",
						dataType:"JSON",
						success:function(data){
							$(".notif").html(data.length);

							console.dir(data);

						}
					});
				}
				get_api();
				function push_api(){
					$.ajax({
						url:"http://localhost/balitsaa/index.php/api",
						method:"GET",
						dataType:"JSON",
						success:function(data){
							for(var i=0;i<data.length;i++){
								$(".kegiatanPeneliti").append(`
									<tr>
										<td>${data[i].nm_peneliti}</td>
										<td>${data[i].judul_kegiatan}</td>
									</tr>

								`);
							}
						}
					});
				}

				$('.ibtn').click(function(){
					push_api();
				});
			setInterval(function(){
			 get_api();
			}, 5000);

			function status () {
				$.ajax({
					url : "http://localhost/balitsaa/index.php/search/status",
					method : "POST",
					success : function(data){
						console.log("berhasil");
					}
				})
			}

			$(".kliknotif").click(function(){
				$("#modal_form").css({"display":"block"})
				status()
			})
			$(".close").click(function(){
				$("#modal_form").css({"display":"none"})
				$(".kegiatanPeneliti").html('')
			})

			});
		</script> 
</html>
