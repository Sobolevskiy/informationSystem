<html>
<head>
	<title>Выбор отчёта</title>
	<link type="text/css" rel="stylesheet" href="../includes/newSite.css"/>
</head>
<body id="authFormBody">
	<form action="?back" method="Post">
		<button id="backButton" type="submit"><-</button>
	</form>
	<div id="headMenu">
		<p id="headlineMini">выбор отчёта</p>
		<p id="headlineMenu">просмотр готовых отчётов</p>
	</div>

	<table id="tableZapros" cellpadding=8 align="center">
		<tr>
			<th id="thForTable">Год</th>
			<th id="thForTable">Выбрать</th>
		</tr>
		<tr>
			<?php foreach($subjects as $subject):?>
				<form action="?next" method="Post">
					<tr>
						<td id="tdForTable" align="center"><?php echo $subject['R_year'];?></td>
						<td align="center">
							<input type="hidden" name="year" value=<?php echo $subject['R_year'];?>>
							<input id="buttonInTable" type="submit" value="Выбор">
						</td>
					</tr>
				</form>
			<?php endforeach;?>
		</tr>
	</table>
</body>
</html>