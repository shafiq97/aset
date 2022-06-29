<?php
session_start();
require '../conn.php';
if(isset($_GET['id_penyelia'])){

  $id_penyelia = $_GET['id_penyelia'];

  $sql = "UPDATE penyelia 
  SET 
  status=0
  WHERE id_staff='$id_penyelia'";

  if ($conn->query($sql) === TRUE) {
    header("location: viewPenyelia.php");
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();
  
}
?>