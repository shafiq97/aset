<?php
  require '../conn.php';
  session_start();
  if(isset($_GET['id_akuan'])){
    $id = $_GET['id_akuan'];

    $sql = "UPDATE akuan set `disahkan` = '1', id_ppas = '$_SESSION[id_ppas]' WHERE `id_akuan` = '$id'";

    if($conn->query($sql) == true){
      ?>
      <script>
        alert('borang telah disahkan')
        window.location.href = 'penerimaan_ppas.php';
      </script>
      <?php
    }
    else{
      echo $conn->error;
    }
  }

  if(isset($_POST['semak'])){
    $id_akuan = $_POST['id_akuan'];
    $nama_pelajar = $_POST['nama_pelajar'];
    $no_matrik = $_POST['no_matrik'];
    $sem = $_POST['sem_no'];
    $tel = $_POST['no_telefon_p'];
    $kkp = $_POST['kkp'];
    $aras = $_POST['aras'];
    $bilik = $_POST['blok'];
    $no_rumah = $_POST['no_rumah'];
    $mbbr = $_POST['mbbr_status'];
    $mbbr_catatan = $_POST['mbbr_catatan'];
    $kerusi  = $_POST['kerusi_status'];
    $kerusi_catatan = $_POST['kerusi_catatan'];
    $almari = $_POST['almari_status'];
    $almari_catatan = $_POST['almari_catatan'];
    $katil = $_POST['katil_status'];
    $katil_catatan = $_POST['katil_catatan'];
    $tilam = $_POST['tilam_status'];
    $tilam_catatan = $_POST['tilam_catatan'];

    $sql = "update akuan set 
    nama_pelajar = '$nama_pelajar',
    no_matrik = '$no_matrik',
    sem_no = '$sem',
    no_telefon_p = '$tel',
    kkp = '$kkp',
    aras = '$aras',
    blok = '$bilik',
    no_rumah = ''
    ";
  }
  
?>