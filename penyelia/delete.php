<?php
session_start();
require '../conn.php';

if(isset($_GET['student_id'])){

  $id_student = $_GET['student_id'];

  $sql = "DELETE FROM pelajar where no_matrik = '$id_student'";

  if ($conn->query($sql) === TRUE) {
    header("location: paparan.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
}
?>