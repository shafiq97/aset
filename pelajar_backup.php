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
  <link rel="stylesheet" href="css/pelajar.css">
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
    <div class="frame">
      <div class="center">
        <div class="profile">
          <div class="profile-info">
            <div class="details">
              <h2 class="name"><?php echo $_SESSION['nama_pelajar'] ?></h2>
              <span class="desc"><?php echo $_SESSION['no_matrik'] ?></span>
              <span class="desc"><?php echo $_SESSION['email_pelajar'] ?></span>
              <span class="desc"><?php echo $_SESSION['no_telefon_p'] ?></span>
            </div>
          </div>
          <div class="stats">
            <div class="box one">
              <span class="value">Sem</span>
              <span class="param"><?php echo $_SESSION['sem_no'] ?></span>
            </div>
            <div class="box two">
              <span class="value">Tahun</span>
              <span class="param"><?php echo $_SESSION['tahun'] ?></span>
            </div>
            <div class="box three">
              <span class="value">No Kunci</span>
              <span class="param"><?php echo $_SESSION['no_kunci'] ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>