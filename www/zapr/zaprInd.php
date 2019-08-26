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

	if (isset($_GET['back'])) {
		header('Location: ../mainMenu/main.php');
	}

	if (isset($_GET['next'])) {
		if (isset($_POST['b1'])) {
			header('Location: zapr1.php');
		}

		if (isset($_POST['b2'])) {
			header('Location: zapr2.php');
		}

		if (isset($_POST['b3'])) {
			header('Location: zapr3.php');
		}

		if (isset($_POST['b4'])) {
			header('Location: zapr4.php');
		}

		if (isset($_POST['b5'])) {
			header('Location: zapr5.php');
		}

		if (isset($_POST['b6'])) {
			header('Location: zapr6.php');
		}
	}

	include 'new.html';
	exit();
?>