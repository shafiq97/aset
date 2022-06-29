<?php

require_once "conn.php";

if(isset($_POST['btnLogin']))
{
	$nomatrik = $_POST["username"];
	$password = $_POST["password"];
	$userType = $_POST["userType"];
	
	$query = "SELECT * FROM login WHERE NoMatrik = '$nomatrik' AND Password='$password' AND Role = '$userType' ";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			if($row["Role"] == "ppas")
			{
				$_SESSION['LoginUser'] = $row["Username"];
				header('Location: ppas.php');
			}
			else if ($row["Role"] == "pelajar") {
				$_SESSION['LoginUser'] = $row["Username"];
				header('Location: pelajar.php');
			}
			else{
				$_SESSION['LoginUser'] = $row["Username"];
				header("Location: penyelia.php");
			}
		}
	}
	else
	{
		$message = "Invalid Username or Password";
		header("Location : index.php");
	}
}
?>