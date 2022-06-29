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
  <link rel="stylesheet" href="../css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/profil_penyelia.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <div class="header">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-DECLARE</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</p>
  </div>
  </div>
  <?php 
    include 'ppas_sidenav.php';
  ?>

  <div class="content">
    <form method="POST" action="update_profile_ppas.php">
      <!-- Id PPAS -->
      <div class="form-group mb-3">
        <label for="id_ppas">Id PPAS</label>
        <input disabled type="text" name="id" class="form-control" id="id_ppas" placeholder="Sila masukkan email" value="<?php echo $_SESSION['id_ppas'] ?>">
      </div>
      <!-- Email PPAS -->
      <div class="form-group mb-3">
        <label for="email_ppas">Email PPAS</label>
        <input disabled type="email" name="email" class="form-control" id="email_ppas" placeholder="Sila masukkan email" value="<?php echo $_SESSION['email_ppas'] ?>">
      </div>
      <!-- Nama PPAS -->
      <div class="form-group mb-3">
        <label for="staff_name">Nama PPAS</label>
        <input disabled type="text" name="name" class="form-control" id="staff_name" placeholder="Sila masukkan nama" value="<?php echo $_SESSION['nama_ppas'] ?>">
      </div>
      <!-- No telefon -->
      <div class="form-group mb-3">
        <label for="no_telefon_ppas">No telefon</label>
        <input type="text" name="no_telefon_ppas" class="form-control" id="no_telefon_ppas" placeholder="Sila masukkan no telefon" value="<?php echo $_SESSION['no_telefon_ppas'] ?>">
      </div>
      <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
  </div>

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