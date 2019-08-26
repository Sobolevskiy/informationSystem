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
    if ($_SESSION['login'] != 'num1' and $_SESSION['login'] != 'teacher') {
      include 'errorPage.html';
      exit();
    }
  }

	$log = $_SESSION['login'];
  $pas = $_SESSION['password'];
	include '../includes/dbconnect_auth.php';

	if (isset($_GET['backToMain'])) {
		header('Location: ../mainMenu/main.php');
	}

	if (isset($_GET['back'])) {
		header('Location: createOtchet.php');
	}

	if (isset($_GET['nextProcPHP'])) {
		$year1 = $_POST['nom'];

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

  		include 'PHPproc.php';
  		exit();
	}

	include 'proc.html';
	exit();
?>