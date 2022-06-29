<?php
session_start();
require "../conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../conn.php';
if (isset($_POST['simpan'])) {
  $id_staff = $_POST['id_staff'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $tel = $_POST['no_telefon'];
  $KKP  = $_POST['KKP'];

  $sql = "INSERT INTO `penyelia`
  (`id_staff`,
  `nama_staff`, 
  `email_staff`, 
  `kata_laluan_s`, 
  `no_telefon_s`,
  `KKP`) 
  VALUES 
  ('$id_staff',
  '$name',
  '$email',
  '$password',
  '$tel',
  '$KKP')";

if ($conn->query($sql) === TRUE) {
  header("location: viewPenyelia.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PENGURUSAN ASET SYSTEM KOLEJ KEDIAMAN PAGOH</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="../css/admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <div class="header">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-DECLARE</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</p>
  </div>
  <?php include "admin_sidenav.php" ?>
  <div class="content_profile">
    <form method="POST">
    <div class="form-group mb-3 col-sm-9">
        <label>Id Staff</label>
        <input required type="text" name="id_staff" class="form-control" placeholder="Id staff">
      </div>
      <div class="form-group mb-3 col-sm-9">
        <label>Name</label>
        <input required type="text" name="name" class="form-control" placeholder="Nama staff">
      </div>
      <div class="form-group mb-3 col-sm-9">
        <label>Email</label>
        <input required type="email" name="email" class="form-control" placeholder="Email staff">
      </div>
      <div class="form-group mb-3 col-sm-9">
        <label>Kata laluan</label>
        <input required type="password" name="password" class="form-control" placeholder="Kata Laluan staff">
      </div>
      <div class="form-group mb-3 col-sm-9">
        <label>No Telefon</label>
        <input required type="text" name="no_telefon" class="form-control" placeholder="No telefon staff">
      </div>
      <!-- <div class="form-group mb-3 col-sm-9">
        <label>Status Aktif</label>
        <select name="status" id="">
          <option value="1">Ya</option>
          <option value="0">Tidak</option>
        </select>
      </div> -->
      <div class="form-group mb-3 col-sm-9">
        <label>KKP</label>
        <select name="KKP" id="">
          <option value="KKP1">1</option>
          <option value="KKP2">2</option>
          <option value="KKP3">3</option>
        </select>
      </div>
      <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
</body>

</html>


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
</body>

</html>