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
	          <h1>Form Permohonan</h1>
	        </div>
	        <div class="">

	          <div class="formPermohonan">
	            <h2 class="formHeader">Form Permohonan</h2>
	            <?php echo validation_errors(); ?>
	            <form class="" method="post" action="<?= base_url('index.php/c_permohonan/masuk'); ?>">
								<?php foreach ($pegawai as $peg):?>
								<div class="inputWrapper">
									<label>No. Permohonan</label>
									<input  class="form-control" id="no" name="no" placeholder="No Secara Otomatis" readonly>
								</div>
								<div class="inputWrapper">
									<label>Nama Peneliti</label>
									<input  class="form-control" id="nama" name="nama" value="<?= $peg->nm_peneliti?>" readonly>
								</div>
								<div class="inputWrapper">
									<label>NIP</label>
									<input  class="form-control" id="nip" name="nip" value="<?= $peg->nip?>" readonly>
								</div>
								<!-- <?php endforeach;?> -->
								<div class="inputWrapper">
									<label>Kelompok Peneliti</label>
									<input  class="form-control" id="kelompok" name="kelompok" value="<?php echo set_value('kelompok');?>">
								</div>
								<div class="inputWrapper">
									<label>Penanggung Jawab Di Lapangan</label>
									<input  class="form-control" id="penanggung" name="penanggung" value="<?php echo set_value('penanggung');?>">
								</div>
								<div class="inputWrapper">
									<label>Sumber Dana</label>
										<select class="form-control" id="sumber" name="sumber" >
											<option>Pilih Sumber Dana</option>
											<option value="DIPA">DIPA</option>
											<option value="ON TOP">ON TOP</option>
											<option value="HIBAH">Hibah</option>
											<option value="KERJASAMA">Kerjasama</option>
									 </select>
								</div>
								<div class="inputWrapper">
									<label>Judul Kegiatan</label>
									<input  class="form-control" id="judul" name="judul" value="<?php echo set_value('judul');?>">
								</div>
								<div class="inputWrapper">
									<label>Kode Kegiatan</label>
									<input  class="form-control" id="kode" name="kode" value="<?php echo set_value('kode');?>">
								</div>
								<div class="inputWrapper">
									 <label>Waktu Kegiatan Berakhir</label>

													<div class='input-group date' id='datetimepicker6'>
															<input type='date' class="form-control" name="mulai" />
															<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
															</span>
													</div>
								</div>
								<div class="inputWrapper">
									<label>Waktu Kegiatan Berakhir</label>
											<div class='input-group date' id='datetimepicker7'>
															<input type='date' class="form-control" name="akhir" />
															<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
															</span>
													</div>
								</div>
								<div class="inputWrapper">
									<label>Komoditas</label>
									<input  class="form-control" id="komoditas" name="komoditas" value="<?php echo set_value('komoditas');?>">
								</div>
								<div class="inputWrapper">
									<label>Lokasi Lahan</label>
										<select class="form-control" id="blok" name="blok">
											<option>Blok</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
											<option value="E">E</option>
											<option value="F1">F1</option>
											<option value="F2">F2</option>
									 </select><br>
									 <select class="form-control" id="no_lahan" name="no_lahan">
											<option value="">No</option>
									 </select>
								</div>
								<input id="kode_lahan" name="kode_lahan" hidden></input>
								<div class="inputWrapper">
									<label>Luas Lahan</label>
									<input  class="form-control" id="luas" name="luas">
								</div>
								<div class="inputWrapper">
									<label>Tanaman Sebelumnya</label>
									<input  class="form-control" id="tanaman" name="tanaman">
								</div>
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
		$('#blok').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/api/get_nomor",
				method : "POST",
				data : {'id': id},
		        dataType : 'json',
				success: function(data){
					var hasil = '';
		            var i;
		            console.log(data);
		            for(i=0; i<data.length; i++){
		                hasil += '<option>'+data[i].nomor+'</option>';
		            }
		            $('#no_lahan').html(hasil);

				}
			});
		});
		$('#no_lahan').change(function(){
			var no=$(this).val();
			var id=$('#blok').val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/api/get_luas",
				method : "POST",
				data : {'id': id,'no':no},
		        dataType : 'json',
				success: function(data){
					var hasil = '';
		            var i;
		            console.log(data);
		             for(i=0; i<data.length; i++){
		                $("#luas").val(data[i].luas);
		                
		            }
		            // $('#luas').html(hasil);
				}

			});
		});

		$('#no_lahan').change(function(){
			var no=$(this).val();
			var id=$('#blok').val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/api/get_lahan",
				method : "POST",
				data : {'id': id,'no':no},
		        dataType : 'json',
				success: function(data){
					var hasil = '';
		            var i;
		            console.log(data);
		             for(i=0; i<data.length; i++){
		                $("#kode_lahan").val(data[i].kd_lahan);
		                $("#tanaman").val(data[i].tanaman_sebelumnya);
		            }
		            // $('#luas').html(hasil);
				}
			});
		});
	});
</script>
</body>
</html>
