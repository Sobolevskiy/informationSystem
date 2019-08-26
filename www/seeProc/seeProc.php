<?php
	session_start();

  if ($_SESSION['log'] != true) {
      session_destroy();
      header('Location: ../authorization/index.php');
  }

	if ($_SESSION['log'] != true) {
		session_destroy();
		header('Location: ../authorization/index.php');
	}
	$log = $_SESSION['login'];
    $pas = $_SESSION['password'];
	include '../includes/dbconnect_auth.php';

	if (isset($_GET['back'])) {
		header('Location: ../mainMenu/main.php');
	}

	if (isset($_GET['back1'])) {
		header('Location: seeProc.php');
	}

	if (isset($_GET['next'])) {
		$year1 = $_POST['year'];
  		$sql = "select * from sobolevvs.report
				where R_year = $year1";
  		try {
  			$result = $pdo->query($sql);
  			$numb = $result->rowcount();
  			if ($numb > 0) {
    			$echo2 = "Такой отчёт уже существует ";
   				$otchet=$result->fetchAll();
  			}
  			else {
    			$q = $pdo->exec("call AVG_POINTS($year1)");
    			$result = $pdo->query($sql);
    			$otchet=$result->fetchAll();
    			$echo2 = "Новые данные добавлены ";
    			$numb = $result->rowcount();
    			if ($numb <= 0) {
      				$echo3 = "Ваш запрос не дал результатов";
    			}
  			}
  		}
  		catch(PDOException $e) {
    		echo"Всё плохо с запросом<br>";
    		exit();
  		}
  		include 'procAnsw.php';
  		exit();
	}

	$sql = "SELECT distinct R_year FROM sobolevvs.report
			order by R_year desc;";
	include '../includes/dbselect.php';
	$subjects = $result->fetchAll();
	include 'seeAvail.php';
	exit();
?>