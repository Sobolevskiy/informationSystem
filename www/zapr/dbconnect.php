<meta charset="utf-8">
<?php
	try
	{
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=sobolevvs', 'root', 'root');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
	echo "Всё плохо<br>";
	exit();
	}
?>