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

	if (isset($_GET['backButton1'])) {
		header('Location: ../mainMenu/main.php');
	}

	if (isset($_GET['mainDel'])) {
		try {
			$sql = "delete FROM sobolevvs.EnrlStudAndStud
					where ESaS_enrl_id=:id and ESaS_zach_num=:zach;";
			$s=$pdo->prepare($sql);
			$s->bindValue(':id',$_POST['enrlId']);
			$s->bindValue(':zach',$_POST['zach']);
			$s->execute();

			$sql = "Update sobolevvs.shedule set Count_students = Count_students - 1 where S_enr_std=:idT;";
			$s=$pdo->prepare($sql);
			$s->bindValue(':idT',$_POST['enrlId']);
			$s->execute();
		} catch (PDOexception $e) {
			$output = 'Ошибка при удалении записи'. $e->getMessage();
			exit();
			}
		if (isset($_POST['edit'])) {
			header('Location: ../scene/mainSceneCont.php');
		}
		$sql = "SELECT Zach_num, Sname, Group_num, Sh_subject, date(Protection_date) as timeD, time(Protection_date) as timeT, ESaS_enrl_id FROM sobolevvs.EnrlStudAndStud e
				join sobolevvs.students s on  s.Zach_num = e.ESaS_zach_num
				join sobolevvs.shedule sh on sh.S_enr_std = ESaS_enrl_id
				order by Protection_date desc;";
		include '../includes/dbselect.php';
		$subjects = $result->fetchAll();
		include '../scene/mainAll.php';
		exit();
	}

	$sql = "SELECT Zach_num, Sname, Group_num, Sh_subject, date(Protection_date) as timeD, time(Protection_date) as timeT, ESaS_enrl_id FROM sobolevvs.EnrlStudAndStud e
				join sobolevvs.students s on  s.Zach_num = e.ESaS_zach_num
				join sobolevvs.shedule sh on sh.S_enr_std = ESaS_enrl_id
				order by Protection_date desc;";
	include '../includes/dbselect.php';
	$subjects = $result->fetchAll();
	include '../scene/mainAll.php';
	exit();
?>