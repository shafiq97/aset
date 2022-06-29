<?php
	require_once('conn.php');

	if(isset($_POST['submit'])){
		echo "form submitted <br><br>" ;
		$kunci = $_POST['kunci']."".$_POST['blok']."".$_POST['room']."".$_POST['number'];
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
		
		
		$sql = "INSERT INTO `akuan`(`lokasi`, `mbbr_status`, `mbbr_catatan`,`kerusi_status`,`kerusi_catatan`,`almari_status`,`almari_catatan`,`katil_status`,`katil_catatan`,`tilam_status`,`tilam_catatan`)
		VALUES ('$kunci', '$mbbrstatus', '$mbbrcatatan','$krstatus','$krcatatan','$apstatus','$apcatatan','$katilstatus','$katilcatatan','$tilamstatus','$tilamcatatan')";
		//echo $sql;
		if ($con->query($sql)===TRUE){
			echo "Added to database";
			//header("location: view.php");
		}
		else{
			echo "Something went wrong.";
		}
	}
	else{
		echo "no submit";
		//redirect to homepage
	}
?>