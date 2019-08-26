﻿<meta charset="utf-8">
<style>
  a {
      text-decoration: none;
      outline: none;
      display: inline-block;
      width: 140px;
      height: 45px;
      line-height: 45px;
      border-radius: 45px;
      margin: 10px 20px;
      font-family: 'Montserrat', sans-serif;
      font-size: 11px;
      text-transform: uppercase;
      text-align: center;
      letter-spacing: 3px;
      font-weight: 600;
      color: rgb(193,162,72);
      background: rgb(21,21,21);
      box-shadow: 0 8px 15px rgba(0,0,0,.1);
      transition: .3s;
    }
    a:hover {
      background: rgb(193,162,72);
      box-shadow: 0 15px 20px rgba(193,162,72,.4);
      color: rgb(21,21,21);
      transform: translateY(-7px);
    }
    body{
      background-size: 100% 100%;
      margin: 0;
      background: #9F8962;
    }

    th {
      color: white;
    }

    table {
      width: 90%;
      font: 19px Arial;
      border-radius: 45px;
      margin-top: 20px;
      text-align: center;
      background-color: rgb(21,21,21);
      color: rgb(193,162,72);
    }
    .back {
        /*position: absolute;*/
        margin-top: 30px;
        margin-left: 30px;
    }
    .ONmain {
        /*position: absolute;*/
        margin-top: calc( -45px - 45px/2);
        margin-left: calc(100% - 140px - 70px);
    }

    .table1 {
      margin-top: 15%;
      color: rgb(21,21,21);
      background: none; 
    }

    .bg {
      font-size: 40px;
    }
</style>
  <div class="back">
    <a href="?backStep" title="Возврат на шаг назад"><--</a>
  </div>
  <div class="ONmain">
    <a href="?backButt" title="Возврат к меню запросов">в меню</a>
  </div>

  <table align="center" class="table1">
    <tr>
       <td align=center class="bg"> <?php echo $echo3; if ($echo3 != '') {
         exit();
       } ?> </td>
    </tr>
  </table>

	<table cellpadding=8 align="center">
	<tr>
	<th> Название проекта </th>
	<th> Фамилия студента </th>
	<th> Группа </th>
	<th> Фамилия преподавателя </th>
	<th> Дата защиты </th>
	<th> Оценка </th>
	</tr>
	<?php foreach ($otchet as $otchets):?>       <tr>
		    <td align=center> <?php echo $otchets['Pname']; ?> </td>
		    <td align=center> <?php echo $otchets['names']; ?> </td>  
			<td align=center> <?php echo $otchets['Group_num']; ?> </td>
			<td align=center> <?php echo $otchets['Sname']; ?> </td>
			<td align=center> <?php echo $otchets['Protection_date']; ?> </td>
			<td align=center> <?php echo $otchets['Mark']; ?> </td>
			</tr>
	<?php endforeach; ?>
</table>
