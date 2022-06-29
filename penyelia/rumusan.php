<?php
require "../conn.php";
session_start();
$sql = "select KKP from penyelia where id_staff = '$_SESSION[id_staff]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $penyelia_kkp = $row['KKP'];
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
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/penerimaan_penyelia.css">
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
    <h3>Bilangan Aset</h3>
    <table id="example" class="display table" style="width:100%">
      <thead>
        <tr>
          <th>Tilam</th>
          <th>Katil</th>
          <th>Almari</th>
          <th>Kerusi</th>
          <th>Meja bersama rak</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT count(*) as bilangan from pelajar";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
              <td><a href="tilam.php"><?php echo $row['bilangan'] ?></a></td>
              <td><a href="katil.php"><?php echo $row['bilangan'] ?></a></td>
              <td><a href="almari.php"><?php echo $row['bilangan'] ?></a></td>
              <td><a href="kerusi.php"><?php echo $row['bilangan'] ?></a></td>
              <td><a href="mbbr.php"><?php echo $row['bilangan'] ?></a></td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        dom: 'Brtip',
      });
    });
  </script>
</body>

</html>