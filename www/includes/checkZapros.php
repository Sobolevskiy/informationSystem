<meta charset="utf-8">
<?php
try
  {
  $result = $pdo->query($sql);
  $numb = $result->rowcount();
  if ($numb > 0) {
    $otchet=$result->fetchAll();
  }
  else
  {
    $echo3 = "Ваш запрос не дал результатов";
  }
  }
  catch(PDOException $e)
  {
    echo "Всё плохо с запросом<br>";
    exit();
  }
?>