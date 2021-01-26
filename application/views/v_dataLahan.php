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
			<a href="tampil_tambah_lahan" class="aBtn"> Tambah Data Lahan</a>
				<table class="tCss">
					<thead>
						<tr>
              <th>No</th>
              <th>Kode Lahan</th>
              <th>Nama Lahan</th>
              <th>Block</th>
              <th>Nomer</th>
              <th>Panjang</th>
              <th>Lebar</th>
              <th>Luas</th>
              <th>Status</th>
              <th>Tanaman Sebelumnya</th>
              <th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1;
							foreach($data as $lahan):?>
						<tr>
              <td><?php echo $no ?></td>
              <td><?php echo $lahan['kd_lahan']; ?></td>
              <td><?php echo $lahan['nm_lahan']; ?></td>
              <td><?php echo $lahan['blok']; ?></td>
              <td><?php echo $lahan['nomor']; ?></td>
              <td><?php echo $lahan['panjang']; ?></td>
              <td><?php echo $lahan['lebar']; ?></td>
              <td><?php echo $lahan['luas']; ?></td>
              <td><?php echo $lahan['status']; ?></td>
              <td><?php echo $lahan['tanaman_sebelumnya']; ?></td>
              <td>
								<a  href="<?= base_url('index.php/search/edit_lahan/?kode='.$lahan['kd_lahan']); ?>">Edit </a>||<a  href="<?= base_url('index.php/search/hapus_lahan/?kode='.$lahan['kd_lahan']); ?>"> Hapus</a>
							</td>
						</tr>
						<?php $no++; endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<div class="modal fade in" id="modal_form" role="dialog" style="display: none;">
		<div class="modal-dialog">
		    <div class="modal-content">
		        <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		            <h3 class="modal-title">Detail Permohonan</h3>
		        </div>
		        <div class="modal-body form">
			        <table class="tCss">
						<thead>
							<tr>
								<th>Nama Peneliti</th>
								<th>Judul Kegiatan</th>
							</tr>
						</thead>
						<tbody class="kegiatanPeneliti">

						</tbody>
					</table>
		        </div>
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
		</div>
</body>
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
