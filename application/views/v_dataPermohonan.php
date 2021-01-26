<DOCTYPE !html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/css/index.css'); ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
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
			<div style="float: left;width: 500px;">
					<h1>Data Permohonan</h1>					
				</div>
				<div style="float: left;width: 500px;text-align: right;">
					<a href="javascript:void(0)" style="color: #fff;height: 80px;line-height: 80px;" class="kliknotif ibtn">Pemberitahuan </a> <sup style="color: #fff" class="notif">(10)</sup>			
				</div>
		</div>
		<div class="formPermohonan">
		<?php echo form_open('search/cari');?>

			<select name='cariberdasarkan' >
				<option value="">Cari Berdasarkan</option>
				<option value="waktu_mulai">Waktu Mulai</option>
				<option value="waktu_selesai">Waktu Selesai</option>
			</select>

			<input type="date" name="yangdicari" id="yangdicari"></input>
			<input type="submit" value="cari"></input>
			<?php echo form_close(); ?>
		<br><br>
		<a class="aBtn" href="<?php echo base_url('index.php/search/tampil_permohonan_permohonan_cetak') ?>">Cetak Berdasarkan Tanggal Mulai Dan Selesai</a>
			<table class="tCss">
				<thead>
					<tr>
						<th>No</th>
						<th>No permohonan</th>
						<th>NIP</th>
						<th>Nama Peneliti</th>
						<th>Judul Kegitan</th>
						<th>Komuditas</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1;
						foreach($data as $Permohonan):?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $Permohonan['no_permohonan']; ?></td>
						<td><?php echo $Permohonan['nip']; ?></td>
						<td><?php echo $Permohonan['nm_peneliti']; ?></td>
						<td><?php echo $Permohonan['judul_kegiatan']; ?></td>
						<td><?php echo $Permohonan['komoditas']; ?></td>
						<td><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="get_data(<?= $Permohonan['no_permohonan'] ?>)"><i class="glyphicon glyphicon-eye-open"></i> Detail</a></td></td>
					<td><a class='btn' href="<?= base_url('index.php/C_permohonan/tampil_konfirmasi?id='.$Permohonan['no_permohonan']); ?>">Konfirmasi </a>|| <a class='btn' href="<?= base_url('index.php/C_permohonan/hapus_permohonan?id='.$Permohonan['no_permohonan']); ?>">Hapus</a></td>
					</tr>
					<?php $no++; endforeach; ?>
				</tbody>
			</table>
			<br>
			<a href="<?php echo base_url('index.php/c_permohonan/login') ?>" class="aBtn red">Back</a>
			<a class="aBtn" href="<?php echo base_url('index.php/Laporanpdf') ?>">Cetak Keseluruhan</a>
		</div>
	</div>
</div>
</script>
		<script type="text/javascript">
		function reply_click(clicked_id)
		{
		    var id = clicked_id;
		    alert(id);
		}
			$(document).ready(function(){
				function get_api(){
					$.ajax({
						url:"http://localhost/balitsaa/index.php/Api/detail",
						method:"GET",
						dataType:"JSON",
						success:function(data){
							console.dir(data);
						}
					});
				}
				function push_api(){
					$.ajax({
						url:"http://localhost/balitsaa/index.php/Api/detail",
						method:"GET",
						dataType:"JSON",
						success:function(data){
								for(var i=0;i<data.length;i++){
								$(".modal-content").append(`
									<li>${data[i].nm_peneliti} <br>${data[i].judul_kegiatan} </li>
								`);
							}
						}
					});
				}

				$('#myBtn').click(function(){
					push_api();
				});
			});
		</script>
		<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
		        <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            <h3 class="modal-title">Person Form</h3>
		        </div>
		        <div class="modal-body form">
		            <form action="#" id="form" class="form-horizontal">
		                <input type="hidden" value="" name="id"/>
		                <div class="form-body">
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">No. Permohonan</label>
		                        <div class="col-md-9">
		                            <input name="no" id="no" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Nama Peneliti</label>
		                        <div class="col-md-9">
		                            <input name="nama" id="nama" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">NIP</label>
		                        <div class="col-md-9">
		                            <input name="nip" id="nip" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Kelompok Peneliti</label>
		                        <div class="col-md-9">
		                            <input name="kelompok" id="kelompok" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Penanggung Jawab Di Lapangan</label>
		                        <div class="col-md-9">
		                            <input name="penanggung" id="penanggung" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Sumber Dana</label>
		                        <div class="col-md-9">
		                            <input name="sumber" id="sumber" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Judul Kegiatan</label>
		                        <div class="col-md-9">
		                            <input name="judul" id="judul" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Kode Kegiatan</label>
		                        <div class="col-md-9">
		                            <input name="kode" id="kode" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Waktu Kegiatan Di Mulai</label>
		                        <div class="col-md-9">
		                            <input name="mulai" id="mulai" class="form-control" type="date" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Waktu Kegiatan Berakhir</label>
		                        <div class="col-md-9">
		                            <input name="berakhir" id="berakhir" class="form-control" type="date" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Komoditas</label>
		                        <div class="col-md-9">
		                            <input name="komoditas" id="komoditas" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Lokasi Lahan</label>
		                        <div class="col-md-9">
		                          <label>Blok</label>
		                            <input name="blok" id="blok" class="form-control" type="text" disabled>
		                            <label>Nomor</label>
		                            <input name="nomor" id="nomor" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Luas Lahan</label>
		                        <div class="col-md-9">
		                            <input name="luas" id="luas" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Tanaman Sebelumnya</label>
		                        <div class="col-md-9">
		                            <input name="sebelum" id="sebelum" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                    <div class="inputWrapper">
		                        <label class="control-label col-md-3">Keterangan</label>
		                        <div class="col-md-9">
		                            <input name="keterangan" id="keterangan" class="form-control" type="text" disabled>
		                            <span class="help-block"></span>
		                        </div>
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<script src="<?php echo base_url('asset/js/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('asset/js/bootstrap.min.js')?>"></script>
<script>
	function get_data(id)
	{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('C_permohonan/get_detail/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="no"]').val(data[0].no_permohonan);
            $('[name="nama"]').val(data[0].nm_peneliti);
            $('[name="nip"]').val(data[0].nip);
            $('[name="kelompok"]').val(data[0].klmpok_peneliti);
            $('[name="penanggung"]').val(data[0].penanggung_jawab);
            $('[name="sumber"]').val(data[0].sumber_dana);
            $('[name="judul"]').val(data[0].judul_kegiatan);
            $('[name="kode"]').val(data[0].kd_kegiatan);
            $('[name="mulai"]').val(data[0].waktu_mulai);
            $('[name="berakhir"]').val(data[0].waktu_selesai);
            $('[name="komoditas"]').val(data[0].komoditas);
            $('[name="blok"]').val(data[0].blok);
            $('[name="nomor"]').val(data[0].no_lahan);
            $('[name="luas"]').val(data[0].luas_lahan);
            $('[name="sebelum"]').val(data[0].tanaman_sebelumnya);
            $('[name="keterangan"]').val(data[0].keterangan);
             $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
             $('.modal-title').text('Detail Permohonan'); // Set title to Bootstrap modal title
            console.log(data);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>
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
