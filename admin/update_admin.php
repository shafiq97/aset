<?php
session_start();
require '../conn.php';
if(isset($_POST['simpan'])){
  $admin_id = $_POST['admin_id'];
  $no_telefon_a = $_POST['no_telefon_a'];

  $sql = "UPDATE admin SET no_telefon_a='$no_telefon_a' WHERE id_admin='$admin_id'";

  if ($conn->query($sql) === TRUE) {
    header("location: viewAdmin.php?id=" . $admin_id);
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();
  
}
?>