<?php
	session_start();
	if (isset($_GET['repeat'])) {
    	header('Location: ../mainMenu/main.php');
  	}

	if ($_SESSION['log'] != true) {
    	session_destroy();
    	header('Location: ../authorization/index.php');
  	}
  	else
  	{
    	if ($_SESSION['login'] != 'num1') {
      		include 'errorPage.html';
      		exit();
    	}
  	}
	$log = $_SESSION['login'];
    $pas = $_SESSION['password'];
	include '../includes/dbconnect_auth.php';

	if (isset($_GET['backButt'])) {
		header('Location: zaprInd.php');
	}

	if (isset($_GET['backStep'])) {
		header('Location: zapr2.php');
	}

	if (isset($_GET['nextPHP'])) {
		$name1 = $_POST['nom'];
		$year1 = $_POST['nom1'];
		$sql = "SELECT * FROM projects p JOIN Shedule S using(S_id) WHERE T_id=(SELECT T_id FROM Teachers WHERE Sname='$name1') 
				AND YEAR(Protection_date)=$year1";
 		include '../includes/checkZapros.php';
 		include 'zapros2.php';
 		exit();
	}

	include 'exp2.html';
	exit();
?>