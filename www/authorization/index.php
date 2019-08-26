<?php
	if (!isset($_POST['login'])) {
		include 'authForm.html';
		exit();
	}

    if (isset($_GET['repeat'])) {
        header('Location: index.php');
    }

	if (isset($_POST['login'])) {
		session_start();
		unset($_SESSION['login']);
		unset($_SESSION['password']);
		$test = 1;
		include '../includes/passForYou.php';
		include '../includes/dbconnect_auth.php';
		$log = $_POST['login'];
    	$pas = $_POST['password'];
    	$sql="SELECT Us_group, Us_gr_pass FROM users WHERE Us_login = '$log' and Us_pass = '$pas'";
    	try
    	{
      		$result=$pdo->query($sql);
    	}
    	catch(PROEXEPTION $e)
    	{
      		echo "Ошибка получения данных".$e->getmessage();
      		exit();
    	}
    	$strings=$result->fetchAll();
    	foreach ($strings as $string):
    	  	$_SESSION['login'] = $string['Us_group'];
		  	$log = $string['Us_group'];
    	  	$_SESSION['password'] = $string['Us_gr_pass'];
		  	$pas = $string['Us_gr_pass'];
    	endforeach; 
    	$test = 10;
    	include '../includes/dbconnect_auth.php';
    	#include 'mainMenu.html';
        $_SESSION['log'] = true;
    	header('Location: ../mainMenu/main.php');
	}
?>