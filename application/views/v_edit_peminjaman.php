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
	              </div>
	            </nav>
	          </div>
	        </div>
	      </div>
	      <div class="content">
	        <div class="topNav">
	          <h1>Form Edit Peminjaman</h1>
	        </div>
	        <div class="">

	          <div class="formPermohonan">
	            <h2 class="formHeader">Form Edit Peminjaman</h2>
	            <?php echo validation_errors(); ?>
	            <form class="" method="post" action="<?= base_url('index.php/search/update_peminjaman'); ?>">
					<?php foreach ($peminjaman as $pmj) :?>
								<div class="inputWrapper">
									<label>No. Peminjaman</label>
									<input  class="form-control" id="no" name="no" placeholder="No Secara Otomatis" value="<?= $pmj->no_peminjaman?>" readonly>
								</div>
								<div class="inputWrapper">
									<label>Penanggung Jawab</label>
									<input  class="form-control" id="nama" name="nama" value="<?= $pmj->penanggung_jawab?>" readonly>
								</div>
								<div class="inputWrapper">
									<label>NIP</label>
									<input  class="form-control" id="nip" name="nip" value="<?= $pmj->nip?>" readonly>
								</div>
								<!-- <?php endforeach;?> -->
								<div class="inputWrapper">
									<label>Nama Aula</label>
									 <select class="form-control" id="nm_aula" name="nm_aula">
											<option value="<?= $pmj->nm_aula?>"><?= $pmj->nm_aula?></option>
									 </select>
								</div>
								<div class="inputWrapper">
									<label>Kode Kegiatan</label>
									<input  class="form-control" id="kegiatan" name="kegiatan" value="<?= $pmj->kd_kegiatan?>">
								</div>
								<div class="inputWrapper">
									<label>Judul Kegiatan</label>
									<input  class="form-control" id="judul" name="judul" value="<?= $pmj->judul_kegiatan?>">
								</div>
								<div class="inputWrapper">
									<label>Kemungkinan Jumlah Peserta</label>
									<input  type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $pmj->jumlah?>">
								</div>
								<div class="inputWrapper">
									 <label>Waktu Kegiatan</label>

													<div class='input-group date' id='datetimepicker6'>
															<input type='date' class="form-control" name="waktu" value="<?= $pmj->waktu_kegiatan?>" />
															<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
															</span>
													</div>
								</div>
								<div class="inputWrapper">
									<label>Keterangan</label>
									<input  class="form-control" id="keterangan" name="keterangan" value="<?= $pmj->keterangan?>">
								</div>
								<div class="inputWrapper">
									<label>Status</label>
									<input  type="number" class="form-control" id="status" name="status" value="<?= $pmj->status?>">
								</div>
								<input id="kode_aula" name="kode_aula" value="<?= $pmj->kd_aula?>" hidden></input>
	              <div class="inputWrapper">
	                <button type="submit" name="button" class="btnSubmit">
	                  Simpan
	                </button>
	              </div>
	            </form>
	           

	          </div>

	        </div>
	      </div>
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
</body>
</html>
