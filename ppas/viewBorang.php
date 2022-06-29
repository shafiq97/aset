<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();

require "../conn.php";

$akuan_id = $_GET['id'];

$sql = "select *, akuan.blok, akuan.aras, akuan.room, akuan.number from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where id_akuan = '$akuan_id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $id_akuan = $row['id_akuan'];
    $nama_pelajar = $row['nama_pelajar'];
    $no_matrik = $row['no_matrik'];
    $sem = $row['sem_no'];
    $tel = $row['no_telefon_p'];
    $kkp = $row['kkp'];
    $aras = $row['aras'];
    $bilik = $row['blok'];
    $no_rumah = $row['no_rumah'];
    $mbbr = $row['mbbr_status'];
    $mbbr_catatan = $row['mbbr_catatan'];
    $kerusi  = $row['kerusi_status'];
    $kerusi_catatan = $row['kerusi_catatan'];
    $almari = $row['almari_status'];
    $almari_catatan = $row['almari_catatan'];
    $katil = $row['katil_status'];
    $katil_catatan = $row['katil_catatan'];
    $tilam = $row['tilam_status'];
    $tilam_catatan = $row['tilam_catatan'];
    $jenis_borang = $row['jenis_borang'];
    $kkp = $row['kkp'];
    $blok = $row['blok'];
    $aras = $row['aras'];
    $room = $row['room'];
    $number = $row['number'];
  }
}

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
  <?php include 'ppas_sidenav.php' ?>
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
      <form action="semak.php" method="get">
        <input type="hidden" value="<?php echo $id_akuan ?>" name="id_akuan">
        <input type="hidden" value="<?php echo $jenis_borang ?>" name="jenis_borang">
        <h2>BORANG AKUAN PEMULANGAN ASET<br> DI BILIK PELAJAR <br>KOLEJ KEDIAMAN PAGOH,UTHM</h2>
        <h3>(A) MAKLUMAT PELAJAR</h3>
        <p>NAMA: <?php echo $nama_pelajar; ?>
        <br>Akaun Id: <?php echo $id_akuan; ?>
          <br>NO. MATRIK: <?php echo $no_matrik; ?>
          <br>SEM/ SESI: <?php echo $sem; ?>
          <br>NO. TEL: <?php echo $tel; ?>
          <br>NO. KUNCI:
          <select name="kunci" id="" required>
            <option value="<?php echo $kkp ?>"><?php echo $kkp ?></option>
          </select>

          <!-- Blocl eg:  -->
          <!-- <input type="text" name="blok" value="" required autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="3" size="3"> -->
          <select name="blok" id="" required>
            <option selected value="<?php echo $blok ?>"><?php echo $blok ?></option>
          </select>
          -
          <!-- Aras -->
          <!-- <input type="text" name="aras" value="" required autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="4" size="4"> -->
          <select name="aras" id="" required>
            <option value="<?php echo $aras ?>"><?php echo $aras ?></option>
          </select>
          -
          <!-- No rumah -->
          <!-- <input type="text" name="room" value="" required autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="4" size="4"> -->
          <select name="room" id="" required>
            <option value="<?php echo $room ?>"><?php echo $room ?></option>
          </select>
          -
          <!-- bilik -->
          <!-- <input type="text" name="number" value="" required autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="2" size="2"> -->
          <select name="number" id="" required>
            <option value="<?php echo $number ?>"><?php echo $number ?></option>
          </select>
          <b>(*Contoh: KKP2A16-B103-C2)</b>
        </p>
        <h3>(B) MAKLUMAT ASET</h3><br>
        <table border="1">
          <tr>
            <td>MEJA BELAJAR BERSAMA RAK</td>
            <?php
            if ($mbbr === "ada") {
            ?>
              <td><input  disabled type="radio" checked name="statusmbbr" value="ada" required autocomplete="off">ADA(Baik)</td>
            <?php
            } else {
            ?>
              <td><input  disabled type="radio" name="statusmbbr" value="ada" required autocomplete="off">ADA(Baik)</td>
            <?php
            }
            ?>
            <td>
              <?php
              if ($mbbr === "kurang") {
              ?>
                <input checked disabled type="radio" name="statusmbbr" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statusmbbr" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($mbbr === "tiada") {
              ?>
                <input checked disabled type="radio" name="statusmbbr" value="tiada" required autocomplete="off">TIADA
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statusmbbr" value="tiada" required autocomplete="off">TIADA
              <?php
              }
              ?>
            </td>
            <td>CATATAN <input readonly value="<?php echo $mbbr_catatan ?>" type="text" name="mcatatan" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" value=""></td>
          </tr>
          <tr>
            <td>KERUSI PELAJAR</td>
            <td>
              <?php
              if ($kerusi === "ada") {
              ?>
                <input checked disabled type="radio" name="statuskr" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statuskr" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($kerusi === "kurang") {
              ?>
                <input  checked disabled type="radio" name="statuskr" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statuskr" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($kerusi === "tiada") {
              ?>
                <input  checked disabled type="radio" name="statuskr" value="tiada" required autocomplete="off">TIADA
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statuskr" value="tiada" required autocomplete="off">TIADA
              <?php
              }
              ?>
            </td>
            <td>CATATAN <input readonly type="text" name="krcatatan" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $kerusi_catatan ?>"></td>
          </tr>
          <tr>
            <td>ALMARI PAKAIAN</td>
            <td>
              <?php
              if ($almari === "ada") {
              ?>
                <input  checked disabled type="radio" name="statusap" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statusap" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($almari === "kurang") {
              ?>
                <input  checked disabled type="radio" name="statusap" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statusap" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($almari === "tiada") {
              ?>
                <input  checked disabled type="radio" name="statusap" value="tiada" required autocomplete="off">TIADA
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statusap" value="tiada" required autocomplete="off">TIADA
              <?php
              }
              ?>
            </td>
            <td>CATATAN <input readonly type="text" name="apcatatan" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $almari_catatan ?>"></td>
          </tr>
          <tr>
            <td>KATIL (BUJANG/ 2 TINGKAT)</td>
            <td>
              <?php
              if ($katil === "ada") {
              ?>
                <input  checked disabled type="radio" name="statusk" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statusk" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($katil === "kurang") {
              ?>
                <input  checked disabled type="radio" name="statusk" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statusk" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($katil === "tiada") {
              ?>
                <input  checked disabled type="radio" name="statusk" value="tiada" required autocomplete="off">TIADA
              <?php
              } else {
              ?>
                <input  disabled type="radio" name="statusk" value="tiada" required autocomplete="off">TIADA
              <?php
              }
              ?>
            </td>
            <td>CATATAN <input readonly type="text" name="kcatatan" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $katil_catatan ?>"></td>
          </tr>
          <tr>
            <td>TILAM</td>
            <td>
              <?php
              if ($tilam === "ada") {
              ?>
                <input  checked disabled type="radio" id="aset" name="tstatus" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              } else {
              ?>
                <input  disabled type="radio" id="aset" name="tstatus" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($tilam === "kurang") {
              ?>
                <input  checked disabled type="radio" id="aset" name="tstatus" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              } else {
              ?>
                <input  disabled type="radio" id="aset" name="tstatus" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($tilam === "tiada") {
              ?>
                <input  checked disabled type="radio" id="aset" name="tstatus" value="tiada" required autocomplete="off">TIADA
              <?php
              } else {
              ?>
                <input  disabled type="radio" id="aset" name="tstatus" value="tiada" required autocomplete="off">TIADA
              <?php
              }
              ?>
            </td>
            <td>CATATAN <input readonly type="text" name="tcatatan" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $tilam_catatan ?>"></td>
          </tr>
        </table>
        <br><br>
        <button type="submit" name="semak" value="submit">Pengesahan</button><br>
      </form>
    </div>
  </div>
</body>
</html>