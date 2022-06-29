<?php
session_start();
require '../conn.php';
if(isset($_POST['simpan'])){

  $no_telefon_s = $_POST['no_telefon_s'];

  $sql = "UPDATE penyelia 
  SET
  no_telefon_s='$no_telefon_s'
  WHERE id_staff='$_SESSION[id_staff]'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['no_telefon_s'] = $no_telefon_s;
    ?>
    <script>
      alert('kemaskini berjaya')
      window.location.href = 'profil_penyelia.php'
    </script>
    <?php
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();
  
}
?>