<?php
session_start();
require '../conn.php';
if(isset($_POST['simpan'])){

  $no_telefon_ppas = $_POST['no_telefon_ppas'];

  $sql = "UPDATE ppas
  SET
  no_telefon_ppas='$no_telefon_ppas'
  WHERE id_ppas='$_SESSION[id_ppas]'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['no_telefon_ppas'] = $no_telefon_ppas;
    ?>
    <script>
      alert('kemaskini berjaya')
      window.location.href = 'profil_ppas.php'
    </script>
    <?php
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();
  
}
?>