<?php
require "../conn.php";
session_start();
$sql = "select KKP from ppas where id_ppas = '$_SESSION[id_ppas]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $ppas_kkp = $row['KKP'];
  }
}


$sql = "select count(*) as bilangan from akuan where kerusi_status = 'ada'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $kerusi_ada = $row['bilangan'];
  }
}

$sql = "select count(*) as bilangan from akuan where kerusi_status = 'tiada'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $kerusi_tiada = $row['bilangan'];
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
    <h3>Kerusi Status Ada: <?php echo $kerusi_ada ?></h3>
    <table id="example" class="display table" style="width:100%">
      <thead>
        <tr>
          <th>Pelajar</th>
          <th>No Matrik</th>
          <th>KKP</th>
          <th>Aras</th>
          <th>No Rumah</th>
          <th>Blok</th>
          <th>Status Kerusi</th>
          <th>Catatan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where kerusi_status = 'ada'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
              <td><?php echo $row['nama_pelajar'] ?></td>
              <td><?php echo $row['no_matrik'] ?></td>
              <td><?php echo $row['kkp'] ?></td>
              <td><?php echo $row['aras'] ?></td>
              <td><?php echo $row['no_rumah'] ?></td>
              <td><?php echo $row['blok'] ?></td>
              <td><?php echo $row['kerusi_status'] ?></td>
              <td><?php echo $row['kerusi_catatan'] ?></td>
              <td><a class="btn btn-success btn-block" href="edit_aset.php?kerusi=<?php echo $row['id_akuan']?>">Edit</a></td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
    <h3>Kerusi Status Tiada: <?php echo $kerusi_tiada ?></h3>
    <table id="example2" class="display table" style="width:100%; margin-top:10px">
      <thead>
        <tr>
        <th>Pelajar</th>
          <th>No Matrik</th>
          <th>KKP</th>
          <th>Aras</th>
          <th>No Rumah</th>
          <th>Blok</th>
          <th>Status Kerusi</th>
          <th>Catatan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where kerusi_status = 'tiada'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
            <td><?php echo $row['nama_pelajar'] ?></td>
              <td><?php echo $row['no_matrik'] ?></td>
              <td><?php echo $row['kkp'] ?></td>
              <td><?php echo $row['aras'] ?></td>
              <td><?php echo $row['no_rumah'] ?></td>
              <td><?php echo $row['blok'] ?></td>
              <td><?php echo $row['kerusi_status'] ?></td>
              <td><?php echo $row['kerusi_catatan'] ?></td>
              <td><a class="btn btn-success btn-block" href="edit_aset.php?kerusi=<?php echo $row['id_akuan']?>">Edit</a></td>
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
      $('#example2').DataTable({
        dom: 'Brtip',
      });
    });
  </script>
</body>

</html>