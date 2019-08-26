<html>
<head>
	<title>Запись</title>
	<link type="text/css" rel="stylesheet" href="../includes/newSite.css"/>
</head>
<body id="authFormBody">
	<form action="?backButton1" method="Post">
		<button id="backButton" type="submit"><-</button>
	</form>
	<div id="headMenu">
		<p id="headlineMini">выбор дисциплины</p>
		<p id="headlineMenu">запись студента на защиту</p>
	</div>

	
	<table id="tableZapros" cellpadding=8 align="center">
		<tr>
			<th id="thForTable">Название предмета</th>
			<th id="thForTable">Выбрать</th>
		</tr>
		<tr>
			<?php foreach($subjects as $subject):?>
				<form action="?nextDateTime" method="Post">
					<tr>
						<td id="tdForTable" align="center"><?php echo $subject['Sh_subject'];?></td>
						<td align="center">
							<input type="hidden" name="Subj_name" value=<?php echo $subject['Sh_subject'];?>>
							<input id="buttonInTable" type="submit" value="Выбор">
						</td>
					</tr>
				</form>
			<?php endforeach;?>
		</tr>
	</table>
</body>
</html>