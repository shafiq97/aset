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
      <form action="semak.php" method="post">
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
            <option value="KKP1">KKP1</option>
            <option value="KKP2">KKP2</option>
            <option value="KKP3">KKP3</option>
          </select>

          <!-- Blocl eg:  -->
          <!-- <input type="text" name="blok" value="" required autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="3" size="3"> -->
          <select name="blok" id="" required>
            <option selected value="<?php echo $blok ?>"><?php echo $blok ?></option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="A3">A3</option>
            <option value="A4">A4</option>
            <option value="A5">A5</option>
            <option value="A11">A11</option>
            <option value="A12">A12</option>
            <option value="A13">A13</option>
            <option value="A14">A14</option>
            <option value="A15">A15</option>
            <option value="A16">A16</option>
            <option value="A17">A17</option>
            <option value="A18">A18</option>
          </select>
          -
          <!-- Aras -->
          <!-- <input type="text" name="aras" value="" required autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="4" size="4"> -->
          <select name="aras" id="" required>
            <option value="<?php echo $aras ?>"><?php echo $aras ?></option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="B3">B3</option>
            <option value="B4">B4</option>
            <option value="B5">B5</option>
          </select>
          -
          <!-- No rumah -->
          <!-- <input type="text" name="room" value="" required autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="4" size="4"> -->
          <select name="room" id="" required>
            <option value="<?php echo $room ?>"><?php echo $room ?></option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
          </select>
          -
          <!-- bilik -->
          <!-- <input type="text" name="number" value="" required autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="2" size="2"> -->
          <select name="number" id="" required>
            <option value="<?php echo $number ?>"><?php echo $number ?></option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="A3">A3</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="B3">B3</option>
            <option value="C1">C1</option>
            <option value="C2">C2</option>
            <option value="C3">C3</option>
            <option value="D1">D1</option>
            <option value="D2">D2</option>
            <option value="D3">D3</option>
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
              <td><input  type="radio" checked name="statusmbbr" value="ada" required autocomplete="off">ADA(Baik)</td>
            <?php
            } else {
            ?>
              <td><input  type="radio" name="statusmbbr" value="ada" required autocomplete="off">ADA(Baik)</td>
            <?php
            }
            ?>
            <td>
              <?php
              if ($mbbr === "kurang") {
              ?>
                <input checked type="radio" name="statusmbbr" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              } else {
              ?>
                <input  type="radio" name="statusmbbr" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($mbbr === "tiada") {
              ?>
                <input checked type="radio" name="statusmbbr" value="tiada" required autocomplete="off">TIADA
              <?php
              } else {
              ?>
                <input  type="radio" name="statusmbbr" value="tiada" required autocomplete="off">TIADA
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
                <input checked type="radio" name="statuskr" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              } else {
              ?>
                <input  type="radio" name="statuskr" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($kerusi === "kurang") {
              ?>
                <input  checked type="radio" name="statuskr" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              } else {
              ?>
                <input  type="radio" name="statuskr" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($kerusi === "tiada") {
              ?>
                <input  checked type="radio" name="statuskr" value="tiada" required autocomplete="off">TIADA
              <?php
              } else {
              ?>
                <input  type="radio" name="statuskr" value="tiada" required autocomplete="off">TIADA
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
                <input  checked type="radio" name="statusap" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              } else {
              ?>
                <input  type="radio" name="statusap" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($almari === "kurang") {
              ?>
                <input  checked type="radio" name="statusap" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              } else {
              ?>
                <input  type="radio" name="statusap" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($almari === "tiada") {
              ?>
                <input  checked type="radio" name="statusap" value="tiada" required autocomplete="off">TIADA
              <?php
              } else {
              ?>
                <input  type="radio" name="statusap" value="tiada" required autocomplete="off">TIADA
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
                <input  checked type="radio" name="statusk" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              } else {
              ?>
                <input  type="radio" name="statusk" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($katil === "kurang") {
              ?>
                <input  checked type="radio" name="statusk" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              } else {
              ?>
                <input  type="radio" name="statusk" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($katil === "tiada") {
              ?>
                <input  checked type="radio" name="statusk" value="tiada" required autocomplete="off">TIADA
              <?php
              } else {
              ?>
                <input  type="radio" name="statusk" value="tiada" required autocomplete="off">TIADA
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
                <input  checked type="radio" id="aset" name="tstatus" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              } else {
              ?>
                <input  type="radio" id="aset" name="tstatus" value="ada" required autocomplete="off">ADA(Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($tilam === "kurang") {
              ?>
                <input  checked type="radio" id="aset" name="tstatus" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              } else {
              ?>
                <input  type="radio" id="aset" name="tstatus" value="kurang" required autocomplete="off">ADA(Kurang Baik)
              <?php
              }
              ?>
            </td>
            <td>
              <?php
              if ($tilam === "tiada") {
              ?>
                <input  checked type="radio" id="aset" name="tstatus" value="tiada" required autocomplete="off">TIADA
              <?php
              } else {
              ?>
                <input  type="radio" id="aset" name="tstatus" value="tiada" required autocomplete="off">TIADA
              <?php
              }
              ?>
            </td>
            <td>CATATAN <input readonly type="text" name="tcatatan" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $tilam_catatan ?>"></td>
          </tr>
        </table>
        <br><br>
        <button type="submit" name="semak" value="submit">Semak</button><br>
      </form>
    </div>
  </div>
</body>
</html>