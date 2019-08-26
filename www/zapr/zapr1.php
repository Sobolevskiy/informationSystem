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
		header('Location: zapr1.php');
	}

	if (isset($_GET['nextPHP'])) {
		$month1 = $_POST['nom'];
		$year1 = $_POST['nom1'];
		$sql = "SELECT Pname, S.Sname names, S.Group_num, T.Sname, Protection_date, Mark FROM projects p 
				JOIN Students S USING(Zach_num)
				JOIN Teachers T USING(T_id)
				JOIN Shedule Sh USING(S_id)
				WHERE YEAR(Protection_date)=$year1 AND MONTH(Protection_date)=$month1";
 		include '../includes/checkZapros.php';
 		include 'zapros1.php';
 		exit();
	}

	include 'exp1.html';
	exit();
?>