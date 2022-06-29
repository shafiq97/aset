<?php
  require '../conn.php';
  session_start();
  // if(isset($_GET['id_akuan'])){
  //   $id = $_GET['id_akuan'];

  //   $sql = "UPDATE akuan set `status` = '1', id_staff = '$_SESSION[id_staff]' WHERE `id_akuan` = '$id'";

  //   if($conn->query($sql) == true){
  //     header("location: penerimaan_penyelia.php");
  //   }
  //   else{
  //     echo $conn->error;
  //   }
  // }

  if(isset($_POST['semak'])){

    $id_akuan = $_POST['id_akuan'];

		$mbbrstatus = $_POST['statusmbbr'];
		$mbbrcatatan = $_POST['mcatatan'];
		$krstatus = $_POST['statuskr'];
		$krcatatan = $_POST['krcatatan'];
		$apstatus = $_POST['statusap'];
		$apcatatan = $_POST['apcatatan'];
		$katilstatus = $_POST['statusk'];
		$katilcatatan = $_POST['kcatatan'];
		$tilamstatus = $_POST['tstatus'];
		$tilamcatatan = $_POST['tcatatan'];

    $kkp = $_POST['kunci'];
    $blok = $_POST['blok'];
    $aras = $_POST['aras'];
    $room = $_POST['room'];
    $number = $_POST['number'];

    $no_kunci = $_POST['kunci'].$_POST['blok'].$_POST['aras'].$_POST['room'].$_POST['number'];

    $sql = "UPDATE `akuan` 
    SET
    `id_staff`='$_SESSION[id_staff]',
    `status`='1',
    `tilam_catatan`='$tilamcatatan',
    `tilam_status`='$tilamstatus',
    `katil_catatan`='$katilcatatan',
    `katil_status`='$katilstatus',
    `almari_catatan`='$tilamcatatan',
    `almari_status`='$tilamstatus',
    `kerusi_catatan`='$krcatatan',
    `kerusi_status`='$krstatus',
    `mbbr_catatan`='$mbbrcatatan',
    `mbbr_status`='$mbbrstatus',
    `no_kunci`='$no_kunci',
    `kkp`='$kkp',
    `blok`='$blok',
    `aras`='$aras',
    `room`='$room',
    `number`='$number' 
    WHERE `id_akuan` = '$id_akuan'";

    if($conn->query($sql) === true){
      ?>
      <script>
        alert("Kemaskini berjaya!")
        window.location.href = 'penyelia.php';
      </script>
      <?php
    }
    else{
      echo $conn->error;
    }
  }
  
?>