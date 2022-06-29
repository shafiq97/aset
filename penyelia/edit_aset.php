<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();

require "../conn.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PENGURUSAN ASET SYSTEM KOLEJ KEDIAMAN PAGOH</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../css/viewBorang.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="header">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-DECLARE</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</p>
  </div>
  <?php include 'penyelia_sidenav.php' ?>
  <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
  </script>
  <div class="content">
    <div class="wrapper">
      <?php
      if (isset($_GET['tilam'])) {
        $sql = "select * from akuan inner join pelajar on pelajar.no_matrik = akuan.no_matrik where id_akuan = '$_GET[tilam]'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
      ?>
            <form action="edit_aset_action.php" method="post">
            <input type="hidden" name="akuan_id" value="<?php echo $_GET['tilam']  ?>">
              <label for="">Nama Pelajar : </label>
              <input type="text" readonly value="<?php echo $row['nama_pelajar'] ?>"><br><br>
              <label for="">Status tilam : </label>
              <select name="tilam_status" id="">
                <option value="ada">Ada</option>
                <option value="kurang">Ada (Kurang Baik)</option>
                <option value="tiada">Tiada</option>
              </select><br><br>
              <label for="">Catatan tilam : </label>
              <input name="catatan_tilam" type="text" value="<?php echo $row['tilam_catatan'] ?>"><br><br>
              <button name="submit_tilam">Submit</button>
            </form>
          <?php
          }
        }
      }
      if (isset($_GET['katil'])) {
        $sql = "select * from akuan inner join pelajar on pelajar.no_matrik = akuan.no_matrik where id_akuan = '$_GET[katil]'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
          ?>
            <form action="edit_aset_action.php" method="post">
              <input type="hidden" name="akuan_id" value="<?php echo $_GET['katil']  ?>">
              <label for="">Nama Pelajar : </label>
              <input type="text" readonly value="<?php echo $row['nama_pelajar'] ?>"><br><br>
              <label for="">Status katil : </label>
              <select name="katil_status" id="">
                <option value="ada">Ada</option>
                <option value="kurang">Ada (Kurang Baik)</option>
                <option value="tiada">Tiada</option>
              </select><br><br>
              <label for="">Catatan katil : </label>
              <input name="catatan_katil" type="text" value="<?php echo $row['katil_catatan'] ?>"><br><br>
              <button name="submit_katil">Submit</button>
            </form>
          <?php
          }
        }
      }
      if (isset($_GET['almari'])) {
        $sql = "select * from akuan inner join pelajar on pelajar.no_matrik = akuan.no_matrik where id_akuan = '$_GET[almari]'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
          ?>
            <form action="edit_aset_action.php" method="post">
            <input type="hidden" name="akuan_id" value="<?php echo $_GET['almari']  ?>">
              <label for="">Nama Pelajar : </label>
              <input type="text" readonly value="<?php echo $row['nama_pelajar'] ?>"><br><br>
              <label for="">Status almari : </label>
              <select name="almari_status" id="">
                <option value="ada">Ada</option>
                <option value="kurang">Ada (Kurang Baik)</option>
                <option value="tiada">Tiada</option>
              </select><br><br>
              <label for="">Catatan almari : </label>
              <input name="catatan_almari" type="text" value="<?php echo $row['almari_catatan'] ?>"><br><br>
              <button name="submit_almari">Submit</button>
            </form>
          <?php
          }
        }
      }
      if (isset($_GET['kerusi'])) {
        $sql = "select * from akuan inner join pelajar on pelajar.no_matrik = akuan.no_matrik where id_akuan = '$_GET[kerusi]'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
          ?>
            <form action="edit_aset_action.php" method="post">
            <input type="hidden" name="akuan_id" value="<?php echo $_GET['kerusi']  ?>">
              <label for="">Nama Pelajar : </label>
              <input type="text" readonly value="<?php echo $row['nama_pelajar'] ?>"><br><br>
              <label for="">Status kerusi : </label>
              <select name="kerusi_status" id="">
                <option value="ada">Ada</option>
                <option value="kurang">Ada (Kurang Baik)</option>
                <option value="tiada">Tiada</option>
              </select><br><br>
              <label for="">Catatan kerusi : </label>
              <input name="catatan_kerusi" type="text" value="<?php echo $row['kerusi_catatan'] ?>"><br><br>
              <button name="submit_kerusi">Submit</button>
            </form>
          <?php
          }
        }
      }
      if (isset($_GET['mbbr'])) {
        $sql = "select * from akuan inner join pelajar on pelajar.no_matrik = akuan.no_matrik where id_akuan = '$_GET[mbbr]'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
          ?>
            <form action="edit_aset_action.php" method="post">
            <input type="hidden" name="akuan_id" value="<?php echo $_GET['mbbr']  ?>">
              <label for="">Nama Pelajar : </label>
              <input type="text" readonly value="<?php echo $row['nama_pelajar'] ?>"><br><br>
              <label for="">Status meja belajar bersama rak : </label>
              <select name="mmbr_status" id="">
                <option value="ada">Ada</option>
                <option value="kurang">Ada (Kurang Baik)</option>
                <option value="tiada">Tiada</option>
              </select><br><br>
              <label for="">Catatan meja belajar bersama rak : </label>
              <input name="catatan_mbbr" type="text" value="<?php echo $row['mbbr_catatan'] ?>"><br><br>
              <button name="submit_mbbr">Submit</button>
            </form>
      <?php
          }
        }
      }
      ?>
    </div>
  </div>
</body>

</html>