<?php
	require_once('conn.php');
  session_start();

	if(isset($_POST['submit_penerimaan'])){
		$kunci = $_POST['kunci'].$_POST['blok'].$_POST['aras'].$_POST['room'].$_POST['number'];
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

		$sql = "INSERT INTO `akuan`
    (
      `lokasi`, 
      `mbbr_status`, 
      `mbbr_catatan`,
      `kerusi_status`,
      `kerusi_catatan`,
      `almari_status`,
      `almari_catatan`,
      `katil_status`,
      `katil_catatan`,
      `tilam_status`,
      `tilam_catatan`, 
      `no_matrik`,
      `jenis_borang`,
      `kkp`,
      `no_kunci`,
      `blok`,
      `aras`,
      `room`,
      `number`
    )
		VALUES
    (
      '$kunci', 
      '$mbbrstatus', 
      '$mbbrcatatan',
      '$krstatus',
      '$krcatatan',
      '$apstatus',
      '$apcatatan',
      '$katilstatus',
      '$katilcatatan',
      '$tilamstatus',
      '$tilamcatatan', 
      '$_SESSION[no_matrik]',
      'penerimaan',
      '$kkp',
      '$kunci',
      '$blok',
      '$aras',
      '$room',
      '$number'
    )";
		//echo $sql;
		if ($conn->query($sql)===TRUE){
      $_SESSION['no_kunci'] = $kunci;
      ?>
      <script>
        alert('Borang telah dihantar dan akan disemak');
        window.location.href = 'profil_pelajar.php';
      </script>
      <?php
		}
		else{
      // echo $conn->error;
      ?>
      <script>
        alert('Borang pernah di hantar, sila semak bersama Penyelia');
        window.location.href = 'profil_pelajar.php';
      </script>
      <?php
		}
	}
  else if(isset($_POST['submit_pemulangan'])){
    $kunci = $_POST['kunci'].$_POST['blok'].$_POST['aras'].$_POST['room'].$_POST['number'];
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

		$sql = "INSERT INTO `akuan`
    (
      `lokasi`, 
      `mbbr_status`, 
      `mbbr_catatan`,
      `kerusi_status`,
      `kerusi_catatan`,
      `almari_status`,
      `almari_catatan`,
      `katil_status`,
      `katil_catatan`,
      `tilam_status`,
      `tilam_catatan`, 
      `no_matrik`,
      `jenis_borang`,
      `kkp`,
      `no_kunci`,
      `blok`,
      `aras`,
      `room`,
      `number`
    )
		VALUES
    (
      '$kunci', 
      '$mbbrstatus', 
      '$mbbrcatatan',
      '$krstatus',
      '$krcatatan',
      '$apstatus',
      '$apcatatan',
      '$katilstatus',
      '$katilcatatan',
      '$tilamstatus',
      '$tilamcatatan', 
      '$_SESSION[no_matrik]',
      'pemulangan',
      '$kkp',
      '$kunci',
      '$blok',
      '$aras',
      '$room',
      '$number'
    )";
		//echo $sql;
		if ($conn->query($sql)===TRUE){
      $_SESSION['no_kunci'] = $kunci;
      ?>
      <script>
        alert('Borang telah dihantar dan akan disemak');
        window.location.href = 'profil_pelajar.php';
      </script>
      <?php
		}
		else{
      // echo $conn->error;
      ?>
      <script>
        alert('Borang pernah di hantar, sila semak bersama Penyelia');
        window.location.href = 'profil_pelajar.php';
      </script>
      <?php
		}
  }
	else{
		echo "no submit";
		//redirect to homepage
	}
?>