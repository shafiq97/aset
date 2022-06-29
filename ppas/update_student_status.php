<?php
session_start();
require '../conn.php';
if(isset($_GET['activate'])){

  $no_matrik = $_GET['activate'];

  $sql = "UPDATE pelajar
  SET
  status=1
  WHERE no_matrik='$no_matrik'";

  if ($conn->query($sql) === TRUE) {
    ?>
    <script>
      alert('kemaskini berjaya')
      window.location.href = 'paparan.php'
    </script>
    <?php
  } else {
    echo "Error updating record: " . $conn->error;
  }
  $conn->close();
}
else if(isset($_GET['deactivate'])){
  $no_matrik = $_GET['deactivate'];

  $sql = "UPDATE pelajar
  SET
  status=0
  WHERE no_matrik='$no_matrik'";

  if ($conn->query($sql) === TRUE) {
    ?>
    <script>
      alert('kemaskini berjaya')
      window.location.href = 'paparan.php'
    </script>
    <?php
  } else {
    echo "Error updating record: " . $conn->error;
  }
  $conn->close();
}
?>