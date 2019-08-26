<?php
	try {
		$result = $pdo -> query($sql);
		$namb=$result->rowcount();
	} catch (PDOException $e) {
		echo "Ошибка при извлечении данных" . $e -> GetMessage();
		#include 'err_out.php';
		exit();
	}
?>