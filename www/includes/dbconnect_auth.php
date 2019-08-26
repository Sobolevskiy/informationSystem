<?php
	try 
	{
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=sobolevvs', $log, $pas);
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (PDOException $e) 
	{
		if ($test == 10) {
			include 'authErr.html';
		}
		else
		{
			echo "<br>Ошибка подключения<br><br>" . $e -> GetMessage();
		}
		exit();
	}
?>