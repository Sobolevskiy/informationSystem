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

	if (isset($_GET['BackDT'])) {
		header('Location: mainSceneCont.php');
	}

	if (isset($_GET['nextDateTime']) or isset($_GET['BackGr'])) {
		if (isset($_GET['nextDateTime'])) {
			$_SESSION['Subj_name'] = $_POST['Subj_name'];
		}
		$subj = $_SESSION['Subj_name'];
		$sql = "SELECT date(Protection_date) as time1, time(Protection_date) as time2, S_enr_std FROM sobolevvs.shedule where Count_students < 10 and Sh_subject = '$subj'";
		include '../includes/dbselect.php';
		$subjects = $result->fetchAll();
		include 'mainDateTime.php';
		exit();
	}

	if (isset($_GET['nextGroup']) or isset($_GET['BackSt'])) {
		if (isset($_GET['nextGroup'])) {
			$_SESSION['mainDate'] = $_POST['date_value'];
			$_SESSION['mainTime'] = $_POST['time_value'];
			$_SESSION['mainTid'] = $_POST['time_id'];
		}
		$time_id = $_SESSION['mainTid'];
		$sql = "alter view sobolevvs.checkEnrStud(E_zach_num) as
				SELECT ESaS_zach_num FROM sobolevvs.EnrlStudAndStud where ESaS_enrl_id = $time_id;";
		include '../includes/dbselect.php';
		$sql = "SELECT Group_num FROM sobolevvs.students s
				left join sobolevvs.checkEnrStud c on s.Zach_num = c.E_zach_num
				where c.E_zach_num is null group by Group_num asc;";
		include '../includes/dbselect.php';
		$subjects = $result->fetchAll();
		include 'mainGroup.php';
		exit();
	}

	if (isset($_GET['nextStudent']) or isset($_GET['BackCh'])) {
		if (isset($_GET['nextStudent'])) {
			$_SESSION['group_num'] = $_POST['Gr_num'];
		}
		$Sgroup = $_SESSION['group_num'];
		#$time_id = $_SESSION['mainTid'];
		$sql = "SELECT distinct Zach_num, Sname FROM sobolevvs.students s
				left join sobolevvs.checkEnrStud c on s.Zach_num = c.E_zach_num
				where Group_num = $Sgroup and c.E_zach_num is null;";
		include '../includes/dbselect.php';
		$subjects = $result->fetchAll();
		include 'mainStudent.php';
		exit();
	}

	if (isset($_GET['nextCheck'])) {
		$_SESSION['zach'] = $_POST['zach'];
		$_SESSION['name'] = $_POST['nameStd'];
		include 'mainCheck.php';
		exit();
	}

	if (isset($_GET['nextAdd'])) {
		try {
			$sql = 'INSERT INTO sobolevvs.EnrlStudAndStud SET ESaS_enrl_id=:id, ESaS_zach_num=:zach';
			$s=$pdo->prepare($sql);
			$s->bindValue(':id',$_SESSION['mainTid']);
			$s->bindValue(':zach',$_SESSION['zach']);
			$s->execute();
		} catch (PDOexception $e) {
			$output = 'Ошибка при записи студента'. $e->getMessage();
			exit();
		}
		$time_id = $_SESSION['mainTid'];
		try {
			$sql = "Update sobolevvs.shedule set Count_students = Count_students + 1 where S_enr_std =:idT;";
			$s=$pdo->prepare($sql);
			$s->bindValue(':idT',$_SESSION['mainTid']);
			$s->execute();
		} catch (PDOexception $e) {
			$output = 'Ошибка при обновлении числа записавшихся'. $e->getMessage();
			exit();
		}

		$sql = "SELECT Zach_num, Sname, Group_num, Sh_subject, date(Protection_date) as timeD, time(Protection_date) as timeT, ESaS_enrl_id FROM sobolevvs.EnrlStudAndStud e
				join sobolevvs.students s on  s.Zach_num = e.ESaS_zach_num
				join sobolevvs.shedule sh on sh.S_enr_std = ESaS_enrl_id
				order by Protection_date desc;";
		include '../includes/dbselect.php';
		$subjects = $result->fetchAll();
		include 'mainAll.php';
		exit();
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
			header('Location: mainSceneCont.php');
		}
		$sql = "SELECT Zach_num, Sname, Group_num, Sh_subject, date(Protection_date) as timeD, time(Protection_date) as timeT, ESaS_enrl_id FROM sobolevvs.EnrlStudAndStud e
				join sobolevvs.students s on  s.Zach_num = e.ESaS_zach_num
				join sobolevvs.shedule sh on sh.S_enr_std = ESaS_enrl_id
				order by Protection_date desc;";
		include '../includes/dbselect.php';
		$subjects = $result->fetchAll();
		include 'mainAll.php';
		exit();
	}

	unset($_SESSION['Subj_name']);
	unset($_SESSION['group_num']);
	unset($_SESSION['mainDate']);
	unset($_SESSION['mainTime']);
	unset($_SESSION['mainTid']);
	unset($_SESSION['zach']);
	unset($_SESSION['name']);
	$sql = 'Select distinct Sh_subject FROM sobolevvs.shedule where Count_students < 10;';

	include '../includes/dbselect.php';
	$subjects = $result->fetchAll();
	include 'mainScSubj.php';
	exit();
?>