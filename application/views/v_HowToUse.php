<!DOCTYPE html>
<html>
<head>

</head>
<body>


</body>
</html>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
$(document).ready(function(){
    $("a").click(function(){
        $("pre").toggle();
    });
});
</script>
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
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="topNav">
        <h1>Cara Penggunaan</h1>
      </div>
      <div class="formPermohonan">
      <ol>
    <li><a href="#" id="">login</a></li>
      <p style="text-align: justify;" >user memasukan username dan password yang sesuai serta memilih jenis user(Admin/Peneliti)
      dengan memilih admin user akan masuk kedalam dasboard Admin begitu dengan peneliti
    </p>
    <br>  
    <li><a href="#" id="">Admin</a></li>
      <p style="text-align: justify;">Admin dapat melakukan edit,tambah,hapus(lahan,user,peneliti) serta mengkonfirmasi permohonan peneliti
      pada bagian admin terdiri dari menu peneliti,user,lahan dan mengkonfirmasi
      pada meu peneliti,user dan lahan admin dapat mengedit hapus serta menambahkan data,
      untuk menambahkan data user admin pertama harus menambahkan data peneliti terlebih dahulu.
      menu konfirmasi admin dapat melakukan konfirmasi permohonan.
    </p>
     <br> 
    <li><a href="#" id="">user</a></li>
      <p style="text-align: justify;">peneliti dapat melakukan permohonan untuk peminjaman lahan dengan menu permohonan,
      peneliti mengisi form terlebih dahulu untuk melakukan sebuah permohonan.
      peneliti dapat melihat history permohonan yang telah masuk kedalam database.
</p>
</ol>
<a  class="btnSubmit" href="<?php echo base_url('') ?>"> Back </a>
      </div>
    </div>
  </div>

</body>
</html>
