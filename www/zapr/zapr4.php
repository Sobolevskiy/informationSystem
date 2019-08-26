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
		header('Location: zapr4.php');
	}

	if (isset($_GET['nextPHP'])) {
		$sql = "SELECT * FROM teachers t
 				LEFT JOIN Projects USING(T_id)
  				WHERE P_id IS NULL";
 		include '../includes/checkZapros.php';
 		include 'zapros4.php';
 		exit();
	}

	include 'exp4.html';
	exit();
?>