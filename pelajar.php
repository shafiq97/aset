<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
require_once 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PENGURUSAN ASET SYSTEM KOLEJ KEDIAMAN PAGOH</title>
  <link rel="stylesheet" href="css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="css/profil_pelajar.css">
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
  <div class="content_profile">
    <form method="POST" action="update_profile_pelajar.php">
      <!-- Email pelajar -->
      <div class="form-group mb-3 col-sm-9">
        <label for="student_email">Email Pelajar</label>
        <input readonly type="email" name="email" class="form-control" id="student_email" placeholder="Sila masukkan email" value="<?php echo $_SESSION['email_pelajar'] ?>">
      </div>
      <!-- Nama Pelajar -->
      <div class="form-group mb-3 col-sm-9">
        <label for="student_name">Nama Pelajar</label>
        <input readonly type="text" name="name" class="form-control" id="student_name" placeholder="Sila masukkan nama" value="<?php echo $_SESSION['nama_pelajar'] ?>">
      </div>
      <!-- No matrik -->
      <div class="form-group mb-3 col-sm-9">
        <label for="student_matrik">No Matrik</label>
        <input readonly type="text" name="no_matrik" class="form-control" id="student_matrik" placeholder="Sila masukkan no matrik" value="<?php echo $_SESSION['no_matrik'] ?>">
      </div>
      <!-- Sem -->
      <div class="form-group mb-3 col-sm-9">
        <div>
        <label for="student_sem">Sem</label>
        <input disabled type="text" name="sem" class="form-control" id="student_sem" placeholder="Sila masukkan no matrik" value="<?php echo $_SESSION['sem_no'] ?>">
        </div>

      </div>
      <!-- Tahun -->
      <div class="form-group mb-3 col-sm-9">
        <label for="tahun">Tahun</label>
        <input disabled type="text" name="tahun" class="form-control" id="tahun" placeholder="Sila masukkan tahun" value="<?php echo $_SESSION['tahun'] ?>">
      </div>
      <!-- Sem -->
      <div class="form-group mb-3 col-sm-9">
        <label for="no_telefon_p">No telefon</label>
        <input disabled type="text" name="no_telefon_p" class="form-control" id="no_telefon_p" placeholder="Sila masukkan no telefon" value="<?php echo $_SESSION['no_telefon_p'] ?>">
      </div>
    </form>
  </div>
</body>

</html>