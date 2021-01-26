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
	              </div>
	            </nav>
	          </div>
	        </div>
	      </div>
	      <div class="content">
	        <div class="topNav">
	          <h1>Form Peminjaman</h1>
	        </div>
	        <div class="">

	          <div class="formPermohonan">
	            <h2 class="formHeader">Form Peminjaman</h2>
	            <?php echo validation_errors(); ?>
	            <form class="" method="post" action="<?= base_url('index.php/c_permohonan/masuk_peminjaman'); ?>">
								<?php foreach ($pegawai as $peg):?>
								<div class="inputWrapper">
									<label>No. Permohonan</label>
									<input  class="form-control" id="no" name="no" placeholder="No Secara Otomatis" readonly>
								</div>
								<div class="inputWrapper">
									<label>Penanggung Jawab</label>
									<input  class="form-control" id="nama" name="nama" value="<?= $peg->nm_peneliti?>" readonly>
								</div>
								<div class="inputWrapper">
									<label>NIP</label>
									<input  class="form-control" id="nip" name="nip" value="<?= $peg->nip?>" readonly>
								</div>
								<!-- <?php endforeach;?> -->
								<div class="inputWrapper">
									<label>Nama Aula</label>
									 <select class="form-control" id="nm_aula" name="nm_aula">
											<option value="">Pilih Aula</option>
									 </select>
								</div>
								<div class="inputWrapper">
									<label>Kode Kegiatan</label>
									<input  class="form-control" id="kegiatan" name="kegiatan" value="<?php echo set_value('kegiatan');?>">
								</div>
								<div class="inputWrapper">
									<label>Judul Kegiatan</label>
									<input  class="form-control" id="judul" name="judul" value="<?php echo set_value('judul');?>">
								</div>
								<div class="inputWrapper">
									<label>Kemungkinan Jumlah Peserta</label>
									<input  type="number" class="form-control" id="jumlah" name="jumlah" value="0">
								</div>
								<div class="inputWrapper">
									 <label>Waktu Kegiatan</label>

													<div class='input-group date' id='datetimepicker6'>
															<input type='date' class="form-control" name="waktu" />
															<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
															</span>
													</div>
								</div>
								<input id="kode_aula" name="kode_aula" hidden></input>
	              <div class="inputWrapper">
	                <button type="submit" name="button" class="btnSubmit">
	                  Kirim
	                </button>
	              </div>
	            </form>
	          </div>

	        </div>
	      </div>
	    </div>

	  </body>

<script type="text/javascript" src="<?php echo base_url().'asset/js/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'asset/js/bootstrap.js'?>"></script>
<script type="text/javascript">
</script>
<script type="text/javascript">
	$(document).ready(function(){
			$.ajax({
				url : "<?php echo base_url();?>index.php/api/get_data_aula",
				method : "POST",
		        dataType : 'json',
				success: function(data){
					var hasil = '';
		            var i;
		            //console.log(data);
		            for(i=0; i<data.length; i++){
		                hasil += '<option value="'+data[i].nm_aula+'">'+data[i].nm_aula+'</option>';
		            }
		            $('#nm_aula').html(hasil);

				}
			});
			$('#nm_aula').change(function(){
			var id=$('#nm_aula').val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/api/get_kode_aula",
				method : "POST",
				data : {'id': id},
		        dataType : 'json',
				success: function(data){
					var hasil = '';
		            var i;
		            console.log(data);
		             for(i=0; i<data.length; i++){
		                $("#kode_aula").val(data[i].kd_aula);
		                
		            }
		            $('#luas').html(hasil);
				}

			});
		});
	});
</script>
</body>
</html>
