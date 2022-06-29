<?php
require 'conn.php';
$sql = "select * from borang";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $statusBorangPenerimaan = $row['status_penerimaan'];
    $statusBorangPemulangan = $row['status_pemulangan'];
  }
}
?>

<div class="sidenav">
  <ul class="nav_list">
    <button class="dropdown-btn">Profil
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href="pelajar.php">
        <span class="links_name">My Profile</span>
      </a>
      <a href="profil_pelajar.php">
        <span class="links_name">Kemaskini Maklumat</span>
      </a>
      <a href="pelajar_tukar_kata_laluan.php">
        <span class="links_name">Tukar Kata Laluan</span>
      </a>
    </div>

    <button class="dropdown-btn">Borang Aset
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <?php
      if ($statusBorangPenerimaan == 0) {
      ?>
        <a href="pelajar.php" onclick="alert('Borang masih belum dibuka')">
          <span class="links_name">Borang Penerimaan</span>
        </a>
      <?php
      } else {
      ?>
        <a href="penerimaan.php">
          <span class="links_name">Borang Penerimaan</span>
        </a>
      <?php
      }
      if ($statusBorangPemulangan == 0) {
      ?>
        <a href="pelajar.php" onclick="alert('Borang masih belum dibuka')">
          <span class="links_name">Borang Pemulangan</span>
        </a>
      <?php
      } else {
      ?>
        <a href="pemulangan.php">
          <span class="links_name">Borang Pemulangan</span>
        </a>
      <?php
      }
      ?>
    </div>
    <a href="index.php">
      <span class="links_name">Keluar</span></i>
    </a>
    </li>
  </ul>
</div>