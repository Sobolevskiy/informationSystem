<html>
<head>
	<title>Выбор студента</title>
	<link type="text/css" rel="stylesheet" href="../includes/newSite.css"/>
</head>
<body id="authFormBody">
	<form action="?BackSt" method="Post">
		<button id="backButton" type="submit"><-</button>
	</form>
	<div id="headMenu">
		<p id="headlineMini">выбор студента</p>
		<p id="headlineMenu">запись студента на защиту</p>
	</div>

	<table id="tableZapros" cellpadding=8 align="center">
		<tr>
			<th id="thForTable">№ зачётки</th>
			<th id="thForTable">Фамилия</th>
			<th id="thForTable">Выбрать</th>
		</tr>
		<tr>
			<?php foreach($subjects as $subject):?>
				<form action="?nextCheck" method="Post">
					<tr>
						<td id="tdForTable" align="center"><?php echo $subject['Zach_num'];?></td>
						<td id="tdForTable" align="center"><?php echo $subject['Sname'];?></td>
						<td align="center">
							<input type="hidden" name="zach" value=<?php echo $subject['Zach_num'];?>>
							<input type="hidden" name="nameStd" value=<?php echo $subject['Sname'];?>>
							<input id="buttonInTable" type="submit" value="Выбор">
						</td>
					</tr>
				</form>
			<?php endforeach;?>
		</tr>
	</table>
</body>
</html>