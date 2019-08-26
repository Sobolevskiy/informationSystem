<?php
	session_start();

	if (isset($_GET['signOut']) or $_SESSION['log'] != true) {
		session_destroy();
		header('Location: ../authorization/index.php');
	}

	if (isset($_GET['repeat'])) {
		header('Location: main.php');
	}

	if (isset($_POST['button1'])) {
		if ($_SESSION['login'] == 'num1' or $_SESSION['login'] == 'student' or $_SESSION['login'] == 'teacher') {
			header('Location: ../seeProc/seeProc.php');
		}
		else
		{
			include 'errorPage.html';
			exit();
		}
	}

	if (isset($_POST['button2'])) {
		if ($_SESSION['login'] == 'num1' or $_SESSION['login'] == 'teacher') {
			header('Location: ../proc/createOtchet.php');
		}
		else
		{
			include 'errorPage.html';
			exit();
		}
	}

	if (isset($_POST['button3'])) {
		if ($_SESSION['login'] == 'num1') {
			header('Location: ../scene/mainSceneCont.php');
		}
		else
		{
			include 'errorPage.html';
			exit();
		}
	}

	if (isset($_POST['button4'])) {
		if ($_SESSION['login'] == 'num1') {
			header('Location: ../zapr/zaprInd.php');
		}
		else
		{
			include 'errorPage.html';
			exit();
		}
	}

	if (isset($_GET['seeAll'])) {
		if ($_SESSION['login'] == 'num1') {
			header('Location: ../see/seeAll.php');
		}
		else
		{
			include 'errorPage.html';
			exit();
		}
	}

	include 'mainMenu.html';
	exit();
?>