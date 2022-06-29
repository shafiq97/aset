<?php
session_start();
require 'conn.php';
if(isset($_POST['simpan'])){

  $email = $_POST['email'];
  $name = $_POST['name'];
  $no_matrik = $_POST['no_matrik'];
  $sem = $_POST['sem'];
  $tahun = $_POST['tahun'];
  $no_telefon_p = $_POST['no_telefon_p'];

  $sql = "UPDATE pelajar SET no_matrik='$no_matrik',nama_pelajar='$name',email_pelajar='$email',sem_no='$sem',tahun='$tahun',no_telefon_p='$no_telefon_p' WHERE no_matrik='$_SESSION[no_matrik]'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['nama_pelajar'] = $name;
    $_SESSION['no_matrik'] = $no_matrik;
    $_SESSION['email_pelajar'] = $email;
    $_SESSION['sem_no'] = $sem;
    $_SESSION['tahun'] = $tahun;
    $_SESSION['no_telefon_p'] = $no_telefon_p;
    header("location: profil_pelajar.php");
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();
  
}
?>