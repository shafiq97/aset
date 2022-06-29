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

$sql = "SELECT count(*) as jumlah_pelajar from pelajar where kkp = '$_SESSION[kkp]' and status='1'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_pelajar = $row['jumlah_pelajar'];
    $aset_patut_ada = $jumlah_pelajar;
  }
}

$sql = "SELECT count(*) as jumlah_hantar from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.kkp = '$_SESSION[kkp]'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_hantar = $row['jumlah_hantar'];
    $jumlah_tidak_hantar = $jumlah_pelajar - $jumlah_hantar;
  }
}

//tilam

$sql = "SELECT count(*) as jumlah_tilam_ada from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.tilam_status = 'ada'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_tilam_ada = $row['jumlah_tilam_ada'];
  }
}

$sql = "SELECT count(*) as jumlah_tilam_kurang from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.tilam_status = 'kurang'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_tilam_kurang = $row['jumlah_tilam_kurang'];
  }
}

$sql = "SELECT count(*) as jumlah_tilam_tiada from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.tilam_status = 'tiada'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_tilam_tiada = $row['jumlah_tilam_tiada'];
  }
}

//katil

$sql = "SELECT count(*) as jumlah_katil_ada from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.katil_status = 'ada'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_katil_ada = $row['jumlah_katil_ada'];
  }
}

$sql = "SELECT count(*) as jumlah_katil_kurang from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.katil_status = 'kurang'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_katil_kurang = $row['jumlah_katil_kurang'];
  }
}

$sql = "SELECT count(*) as jumlah_katil_tiada from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.katil_status = 'tiada'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_katil_tiada = $row['jumlah_katil_tiada'];
  }
}

//almari
$sql = "SELECT count(*) as jumlah_almari_ada from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.almari_status = 'ada'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_almari_ada = $row['jumlah_almari_ada'];
  }
}

$sql = "SELECT count(*) as jumlah_almari_kurang from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.almari_status = 'kurang'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_almari_kurang = $row['jumlah_almari_kurang'];
  }
}

$sql = "SELECT count(*) as jumlah_almari_tiada from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.almari_status = 'tiada'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_almari_tiada = $row['jumlah_almari_tiada'];
  }
}

//kerusi 

$sql = "SELECT count(*) as jumlah_kerusi_ada from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.kerusi_status = 'ada'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_kerusi_ada = $row['jumlah_kerusi_ada'];
  }
}

$sql = "SELECT count(*) as jumlah_kerusi_kurang from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.kerusi_status = 'kurang'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_kerusi_kurang = $row['jumlah_kerusi_kurang'];
  }
}

$sql = "SELECT count(*) as jumlah_kerusi_tiada from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.kerusi_status = 'tiada'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_kerusi_tiada = $row['jumlah_kerusi_tiada'];
  }
}
//meja bersama rak

$sql = "SELECT count(*) as jumlah_mbbr_ada from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.mbbr_status = 'ada'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_mbbr_ada = $row['jumlah_mbbr_ada'];
  }
}

$sql = "SELECT count(*) as jumlah_mbbr_kurang from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.mbbr_status = 'kurang'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_mbbr_kurang = $row['jumlah_mbbr_kurang'];
  }
}

$sql = "SELECT count(*) as jumlah_mbbr_tiada from akuan inner join pelajar on akuan.no_matrik = pelajar.no_matrik where jenis_borang = 'pemulangan' and akuan.mbbr_status = 'tiada'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jumlah_mbbr_tiada = $row['jumlah_mbbr_tiada'];
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

<style>
  table,
  th,
  td {
    border: 1px solid black;
  }
</style>

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
    <div>
      <h3>Jumlah pelajar yang mendaftar kolej kediaman: <?php echo $jumlah_pelajar ?></h3>
      <h3>Bilangan pelajar menghantar borang pemulangan aset: <?php echo $jumlah_hantar ?></h3>
      
        <h3>Bilangan pelajar yang tidak menghantar borang pemulangan aset: <a href="tidak_hantar_borang_pemulangan.php"><?php echo $jumlah_tidak_hantar ?></a></h3>

      </a>
    </div>
    <div style="margin-top: 50px;">
      <h2>Rumusan pemulangan</h2>

      <table style="width:100%">

        <tr>
          <th>Aset</th>
          <th>Patut ada</th>
          <th>Ada (Baik)</th>
          <th>Ada (Kurang baik)</th>
          <th>Tiada</th>
        </tr>
        <tr>
          <th>Tilam</th>
          <td><?php echo $aset_patut_ada ?></td>
          <td><?php echo $jumlah_tilam_ada ?></td>
          <td><a href="tilam_kurang_baik.php"><?php echo $jumlah_tilam_kurang ?></a></td>
          <td><a href="tiada_tilam.php"><?php echo $jumlah_tilam_tiada ?></a></td>
        </tr>
        <tr>
          <th>Katil</th>
          <td><?php echo $aset_patut_ada ?></td>
          <td><?php echo $jumlah_katil_ada ?></td>
          <td><a href="katil_kurang_baik.php"><?php echo $jumlah_katil_kurang ?></a></td>
          <td><a href="tiada_katil.php"><?php echo $jumlah_katil_tiada ?></a></td>
        </tr>
        <tr>
          <th>Almari</th>
          <td><?php echo $aset_patut_ada ?></td>
          <td><?php echo $jumlah_almari_ada ?></td>
          <td><a href="almari_kurang_baik.php"><?php echo $jumlah_almari_kurang ?></a></td>
          <td><a href="tiada_almari.php"><?php echo $jumlah_almari_tiada ?></a></td>
        </tr>
        <tr>
          <th>Kerusi</th>
          <td><?php echo $aset_patut_ada ?></td>
          <td><?php echo $jumlah_kerusi_ada ?></td>
          <td><a href="kerusi_kurang_baik.php"><?php echo $jumlah_kerusi_kurang ?></a></td>
          <td><a href="tiada_kerusi.php"><?php echo $jumlah_kerusi_tiada ?></a></td>
        </tr>
        <tr>
          <th>Meja bersama rak</th>
          <td><?php echo $aset_patut_ada ?></td>
          <td><?php echo $jumlah_mbbr_ada ?></td>
          <td><a href="mbbr_kurang_baik.php"><?php echo $jumlah_mbbr_kurang ?></a></td>
          <td><a href="tiada_mbbr.php"><?php echo $jumlah_mbbr_tiada ?></a></td>
        </tr>
    </div>
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