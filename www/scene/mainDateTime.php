<html>
<head>
	<title>Выбор даты и времени</title>
	<link type="text/css" rel="stylesheet" href="../includes/newSite.css"/>
</head>
<body id="authFormBody">
	<form action="?BackDT" method="Post">
		<button id="backButton" type="submit"><-</button>
	</form>
	<div id="headMenu">
		<p id="headlineMini">выбор даты и времени</p>
		<p id="headlineMenu">запись студента на защиту</p>
	</div>

	<table id="tableZapros" cellpadding=8 align="center">
		<tr>
			<th id="thForTable">Дата защиты</th>
			<th id="thForTable">Время защиты</th>
			<th id="thForTable">Выбрать</th>
		</tr>
		<tr>
			<?php foreach($subjects as $subject):?>
				<form action="?nextGroup" method="Post">
					<tr>
						<td id="tdForTable" align="center"><?php echo $subject['time1'];?></td>
						<td id="tdForTable" align="center"><?php echo $subject['time2'];?></td>
						<td align="center">
							<input type="hidden" name="date_value" value=<?php echo $subject['time1'];?>>
							<input type="hidden" name="time_value" value=<?php echo $subject['time2'];?>>
							<input type="hidden" name="time_id" value=<?php echo $subject['S_enr_std'];?>>
							<input id="buttonInTable" type="submit" value="Выбор">
						</td>
					</tr>
				</form>
			<?php endforeach;?>
		</tr>
	</table>
</body>
</html>