<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PENGURUSAN ASET SYSTEM KOLEJ KEDIAMAN PAGOH</title>
  <link rel="stylesheet" href="css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/penerimaan.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <div class="header">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-DECLARE</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</p>
  </div>
  <?php include 'student/student_sidenav.php' ?>
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
      <form action="submit.php" method="post" if(form_being_submitted) { alert('The form is being submitted, please wait a moment...'); myButton.disabled=true; return false; } if(checkForm(this)) { myButton.value='Submitting form...' ; form_being_submitted=true; return true; } return false;>
        <h2>BORANG AKUAN PENERIMAAN ASET <br>DI BILIK PELAJAR <br>KOLEJ KEDIAMAN PAGOH,UTHM</h2>
        <p>PERINGATAN/ TINDAKAN: <br><br>
          1.SUSUNAN ASET ADALAH BERPANDUKAN PLAN SUSUN ATUR PERABOT YANG TELAH DISEDIAKAN.
          <br>2. PASTIKAN SEMUA ASET DALAM KEADAAN BAIK.
          <br>3. LAPORKAN SETIAP KEROSAKAN ASET KE PEJABAT KOLEJ MASING-MASING.
          <br>4. TIDAK MEROSAKKAN ATAU MELAKUKAN VANDALISMA TERHADAP ASET.
          <br>5. SILA PASTIKAN ASET YANG DITERIMA ADALAH SAMA DENGAN NOMBOR KUNCI YANG ANDA TERIMA.
        </p>
        <h3>(A) MAKLUMAT PELAJAR</h3>
        <p>NAMA: <?php echo $_SESSION['nama_pelajar']; ?>
          <br>NO. MATRIK: <?php echo $_SESSION['no_matrik']; ?>
          <br>SEM/ SESI: <?php echo $_SESSION['sem_no']; ?>
          <br>NO. TEL: <?php echo $_SESSION['no_telefon_p']; ?>

          <!-- eg: KKP1 -->
          <br>NO. KUNCI:
          <select name="kunci" id="" required>
            <option value="">Sila Pilih</option>
            <option value="KKP1">KKP1</option>
            <option value="KKP2">KKP2</option>
            <option value="KKP3">KKP3</option>
          </select>

          <!-- Blocl eg:  -->
          <!-- <input type="text" name="blok" value="" required autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="3" size="3"> -->
          <select name="blok" id="" required>
            <option value="">Sila Pilih</option>
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
            <option value="">Sila Pilih</option>
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
            <option value="">Sila Pilih</option>
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
            <option value="">Sila Pilih</option>
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
            <td><input type="radio" id="mbbrstatus" name="statusmbbr" value="ada" required autocomplete="off">ADA(Baik)</td>
            <td><input type="radio" id="mbbrstatus" name="statusmbbr" value="kurang" required autocomplete="off">ADA(Kurang Baik)</td>
            <td><input type="radio" id="mbbrstatus" name="statusmbbr" value="tiada" required autocomplete="off">TIADA</td>
            <td>CATATAN <input type="text" name=" mcatatan" onkeyup="this.value = this.value.toUpperCase();" value=""></td>
          </tr>
          <tr>
            <td>KERUSI PELAJAR</td>
            <td><input type="radio" id="aset" name="statuskr" value="ada" required autocomplete="off">ADA(Baik)</td>
            <td><input type="radio" id="aset" name="statuskr" value="kurang" required autocomplete="off">ADA(Kurang Baik)</td>
            <td><input type="radio" id="aset" name="statuskr" value="tiada" required autocomplete="off">TIADA</td>
            <td>CATATAN <input type="text" name="krcatatan" onkeyup="this.value = this.value.toUpperCase();" value=""></td>
          </tr>
          <tr>
            <td>ALMARI PAKAIAN</td>
            <td><input type="radio" id="aset" name="statusap" value="ada" required autocomplete="off">ADA(Baik)</td>
            <td><input type="radio" id="aset" name="statusap" value="kurang" required autocomplete="off">ADA(Kurang Baik)</td>
            <td><input type="radio" id="aset" name="statusap" value="tiada" required autocomplete="off">TIADA</td>
            <td>CATATAN <input type="text" name="apcatatan" value="" onkeyup="this.value = this.value.toUpperCase();"></td>
          </tr>
          <tr>
            <td>KATIL (BUJANG/ 2 TINGKAT)</td>
            <td><input type="radio" id="aset" name="statusk" value="ada" required autocomplete="off">ADA(Baik)</td>
            <td><input type="radio" id="aset" name="statusk" value="kurang" required autocomplete="off">ADA(Kurang Baik)</td>
            <td><input type="radio" id="aset" name="statusk" value="tiada" required autocomplete="off">TIADA</td>
            <td>CATATAN <input type="text" name="kcatatan" onkeyup="this.value = this.value.toUpperCase();" value=""></td>
          </tr>
          <tr>
            <td>TILAM</td>
            <td><input type="radio" id="aset" name="tstatus" value="ada" required autocomplete="off">ADA(Baik)</td>
            <td><input type="radio" id="aset" name="tstatus" value="kurang" required autocomplete="off">ADA(Kurang Baik)</td>
            <td><input type="radio" id="aset" name="tstatus" value="tiada" required autocomplete="off">TIADA</td>
            <td>CATATAN <input type="text" name="tcatatan" onkeyup="this.value = this.value.toUpperCase();" value=""></td>
          </tr>
        </table>
        <br><br>
        <h3>(C) AKUAN PENERIMAAN ASET</h3>
        <br><input type="checkbox" name="agree" required>&emsp;Saya dengan ini mengesahkan telah menyemak dan menerima aset sepertimana yang dinyatakan dalam bahagian (B). <br>Sepanjang tempoh pemilikan aset tersebut saya bertanggungjawab sepenuhnya untuk memastikan aset yang diberikan berada dalam keadaan baik dan sempurna.
        <br>
        <button type="submit" name="submit_penerimaan" value="submit">Hantar</button><br>

      </form>
    </div>
  </div>

</body>

</html>