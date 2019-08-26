<html>
<head>
	<title>Список записавшихся</title>
	<link type="text/css" rel="stylesheet" href="../includes/newSite.css"/>
</head>
<body id="authFormBody">
	<form action="?backButton1" method="Post">
		<button id="backButtonAll" type="submit">меню</button>
	</form>
	<div id="headMenu">
		<p id="headlineMini">редактирование</p>
		<p id="headlineMenu">записавшиеся студенты</p>
	</div>

	<table id="tableZaprosAll" cellpadding=8 align="center" width="80%">
		<tr>
			<th id="thForAll">№ зачётки</th>
			<th id="thForAll">Фамилия</th>
			<th id="thForAll">Предмет</th>
			<th id="thForAll">Дата</th>
			<th id="thForAll">Время</th>
			<th id="thForAll">Группа</th>
		</tr>
		<tr>
			<?php foreach($subjects as $subject):?>
				<form action="?mainDel" method="Post">
					<tr>
						<td id="tdForAll" align="center"><?php echo $subject['Zach_num'];?></td>
						<td id="tdForAll" align="center"><?php echo $subject['Sname'];?></td>
						<td id="tdForAll" align="center"><?php echo $subject['Sh_subject'];?></td>
						<td id="tdForAll" align="center"><?php echo $subject['timeD'];?></td>
						<td id="tdForAll" align="center"><?php echo $subject['timeT'];?></td>
						<td id="tdForAll" align="center"><?php echo $subject['Group_num'];?></td>
						<td align="center">
							<input type="hidden" name="zach" value=<?php echo $subject['Zach_num'];?>>
							<input type="hidden" name="enrlId" value=<?php echo $subject['ESaS_enrl_id'];?>>
							<input id="buttonInTableDel" class="wrn" name="del" type="submit" value="del">
							<input id="buttonInTableEdit" class="wrn" name="edit" type="submit" value="edit">
						</td>
					</tr>
				</form>
			<?php endforeach;?>
		</tr>
	</table>
	<script src="../includes/warningJS.js"></script>
</body>
</html>