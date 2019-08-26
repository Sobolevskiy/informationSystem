<html>
<head>
	<title>Просмотр отчёта</title>
	<link type="text/css" rel="stylesheet" href="../includes/newSite.css"/>
	<style>
		#backButtonAll {
			margin-top: 100px;
			margin-left: 35px;
			position: absolute;
			border-style: none;
			text-align: center;
			width: 100px;
			border-radius: 25px;
			height: 45px;
			text-decoration: none;
    		outline: none;
    		background-color: rgb(229, 178, 65);
    		color: #101010;
    		font-family: 'Roboto', sans-serif;
    		line-height: 40px;
    		font-size: 20px;
		}

		#backButtonAll:hover {
			background-color: #39509B;
			color: #101010;
		}
	</style>
</head>
<body id="authFormBody">
	<form action="?back1" method="Post">
		<button id="backButton" type="submit"><-</button>
	</form>
	<form action="?back" method="Post">
		<button id="backButtonAll" type="submit">в меню</button>
	</form>
	<div id="headMenu">
		<p id="headlineMini">просмотр отчёта</p>
		<p id="headlineMenu">просмотр готовых отчётов</p>
	</div>

	<table id="tableZapros" cellpadding=8 align="center">
		<tr>
			<th id="thForTable">ID</th>
			<th id="thForTable">Год</th>
			<th id="thForTable">Предмет</th>
			<th id="thForTable">Средний балл</th>
		</tr>
		<tr>
			<?php foreach($otchet as $otchets):?>
				<tr>
					<td id="tdForTable" align="center"><?php echo $otchets['R_id'];?></td>
					<td id="tdForTable" align="center"><?php echo $otchets['R_year'];?></td>
					<td id="tdForTable" align="center"><?php echo $otchets['R_subject'];?></td>
					<td id="tdForTable" align="center"><?php echo $otchets['R_avg_ball'];?></td>
				</tr>
			<?php endforeach;?>
		</tr>
	</table>
</body>
</html>