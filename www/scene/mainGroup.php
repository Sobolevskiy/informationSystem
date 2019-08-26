<html>
<head>
	<title>Выбор группы</title>
	<link type="text/css" rel="stylesheet" href="../includes/newSite.css"/>
</head>
<body id="authFormBody">
	<form action="?BackGr" method="Post">
		<button id="backButton" type="submit" name="backButton2"><-</button>
	</form>
	<div id="headMenu">
		<p id="headlineMini">выбор группы</p>
		<p id="headlineMenu">запись студента на защиту</p>
	</div>

	<table id="tableZapros" cellpadding=8 align="center">
		<tr>
			<th id="thForTable">Номер группы</th>
			<th id="thForTable">Выбрать</th>
		</tr>
		<tr>
			<?php foreach($subjects as $subject):?>
				<form action="?nextStudent" method="Post">
					<tr>
						<td id="tdForTable" align="center"><?php echo $subject['Group_num'];?></td>
						<td align="center">
							<input type="hidden" name="Gr_num" value=<?php echo $subject['Group_num'];?>>
							<input id="buttonInTable" type="submit" value="Выбор">
						</td>
					</tr>
				</form>
			<?php endforeach;?>
		</tr>
	</table>
</body>
</html>