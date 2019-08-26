<html>
<head>
	<title>Подтверждение</title>
	<link type="text/css" rel="stylesheet" href="../includes/newSite.css"/>
</head>
<body id="authFormBody">
	<form action="?BackCh" method="Post">
		<button id="backButton" type="submit"><-</button>
	</form>
	<div id="headMenu">
		<p id="headlineMini">проверка данных</p>
		<p id="headlineMenu">запись студента на защиту</p>
	</div>

	<table id="tableZapros" cellpadding=8 align="center">
		<tr>
			<th id="thCheck" align="center">№ зачётки:</th>
			<th id="thDATA" align="center"><?php echo $_SESSION['zach'];?></th>
		</tr>
		<tr>
			<th id="thCheck" align="center">Фамилия:</th>
			<th id="thDATA" align="center"><?php echo $_SESSION['name'];?></th>
		</tr>
		<tr>
			<th id="thCheck" align="center">Группа:</th>
			<th id="thDATA" align="center"><?php echo $_SESSION['group_num'];?></th>
		</tr>
		<tr>
			<th id="thCheck" align="center">Предмет:</th>
			<th id="thDATA" align="center"><?php echo $_SESSION['Subj_name'];?></th>
		</tr>
		<tr>
			<th id="thCheck" align="center">Дата:</th>
			<th id="thDATA" align="center"><?php echo $_SESSION['mainDate'];?></th>
		</tr>
		<tr>
			<th id="thCheck" align="center">Время:</th>
			<th id="thDATA" align="center"><?php echo $_SESSION['mainTime'];?></th>
		</tr>
	</table>
	<table id="bottomButtons" border="0" align="center">
		<th>
			<form action="?" method="Post">
				<input id="buttonInCheck" type="submit" value="Заново">
			</form>
		</th>
		<th>
			<form action="?nextAdd" method="Post">
				<input id="buttonInCheck" type="submit" value="Продолжить">
			</form>
		</th>
	</table>
</body>
</html>