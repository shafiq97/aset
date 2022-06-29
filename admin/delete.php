<?php
session_start();
require '../conn.php';

if(isset($_GET['penyelia_id'])){

  $id_penyelia = $_GET['penyelia_id'];

  $sql = "DELETE FROM penyelia where id_staff = '$id_penyelia'";

  if ($conn->query($sql) === TRUE) {
    header("location: viewPenyelia.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
}

if(isset($_GET['ppas_id'])){

  $id_ppas = $_GET['ppas_id'];

  $sql = "DELETE FROM ppas where id_ppas = '$id_ppas'";

  if ($conn->query($sql) === TRUE) {
    header("location: viewPPAS.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
}
?>