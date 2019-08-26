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
		header('Location: zapr6.php');
	}

	if (isset($_GET['nextPHP'])) {
		$sql = "SELECT * FROM teachers
  				WHERE T_id = (SELECT id FROM top_teacher
  				WHERE Amount = (SELECT MAX(Amount) FROM top_teacher))";
 		include '../includes/checkZapros.php';
 		include 'zapros6.php';
 		exit();
	}

	include 'exp6.html';
	exit();
?>