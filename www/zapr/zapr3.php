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
		header('Location: zapr3.php');
	}

	if (isset($_GET['nextPHP'])) {
		$sql = "SELECT * FROM teachers t WHERE Employ_date=(SELECT MIN(Employ_date) FROM teachers)";
 		include '../includes/checkZapros.php';
 		include 'zapros3.php';
 		exit();
	}

	include 'exp3.html';
	exit();
?>