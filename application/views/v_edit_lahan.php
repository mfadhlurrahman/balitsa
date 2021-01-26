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
	          <div style="float: left;width: 500px;">
					<h1>Edit Data Lahan</h1>					
				</div>
				<div style="float: left;width: 500px;text-align: right;">
					<a href="javascript:void(0)" style="color: #fff;height: 80px;line-height: 80px;" class="kliknotif ibtn">Pemberitahuan </a> <sup style="color: #fff" class="notif">(10)</sup>			
				</div>
	        </div>
	        <div class="">
	          <div class="formPermohonan">
	            <h2 class="formHeader">Edit Data Lahan</h2>
	            <?php echo validation_errors(); ?>
	            <form class="" method="post" action="<?= base_url('index.php/search/update_lahan'); ?>">
	             <?php foreach ($lahan as $lh) :?>
								<div class="inputWrapper">
									<label>Kode Lahan</label>
									<input  class="form-control" id="kode" name="kode" value="<?= $lh->kd_lahan ?>">
								</div>
								<div class="inputWrapper">
									<label>Nama Lahan</label>
									<input  class="form-control" id="nama" name="nama" value="<?= $lh->nm_lahan ?>">
								</div>
								<div class="inputWrapper">
									<label>Blok</label>
									<input  class="form-control" id="blok" name="blok" value="<?= $lh->blok ?>">
								</div>
								<div class="inputWrapper">
									<label>No. Lahan</label>
									<input  class="form-control" id="no" name="no" value="<?= $lh->nomor ?>">
								</div>
								<div class="inputWrapper">
									<label>Panjang Lahan</label>
									<input  class="form-control" id="panjang" name="panjang" value="<?= $lh->panjang ?>">
								</div>
								<div class="inputWrapper">
									<label>Lebar Lahan</label>
									<input  class="form-control" id="lebar" name="lebar" value="<?= $lh->lebar ?>">
								</div>
								<div class="inputWrapper">
									<label>Luas Lahan</label>
									<input  class="form-control" id="luas" name="luas" value="<?= $lh->luas ?>" >
								</div>
								<div class="inputWrapper">
									<label>Status</label>
									<input  class="form-control" id="status" name="status" value="<?= $lh->status ?>" >
								</div>
								<div class="inputWrapper">
									<label>Tanaman Sebelumnya</label>
									<input  class="form-control" id="sebelum" name="sebelum" value="<?= $lh->tanaman_sebelumnya ?>">
								</div>
	              <div class="inputWrapper">
	                <button type="submit" name="button" class="btnSubmit">
	                  Simpan
	                </button>
	                 <?php  endforeach; ?>
	              </div>
	            </form>
	          </div>

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
