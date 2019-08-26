<meta charset="utf-8">
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
        margin-top: 30px;
        margin-left: 30px;
    }
    .ONmain {
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
      <a href="?back" title="Возврат на шаг назад"><--</a>
    </div>
    <div class="ONmain">
      <a href="?backToMain" title="Возврат на главную">на главную</a>
    </div>

  <table align="center" class="table1">
    <tr>
      <td align=center> <?php echo $echo2; ?> </td>
    </tr>
    <tr>
      <td align=center> <?php echo $echo4; ?> </td>
    </tr>
    <tr>
      <td align=center class="bg"> <?php echo $echo3; if ($echo3 != '') {
        exit();
       } ?> 
      </td>
    </tr>
  </table>
  
  <table cellpadding=8 align="center">
  <tr>
  <th> ID </th>
  <th> Год </th>
  <th> Предмет </th>
  <th> Средний балл </th>
  </tr>
  <?php foreach ($otchet as $otchets):?>       <tr>
        <td align=center> <?php echo $otchets['R_id']; ?> </td>
        <td align=center> <?php echo $otchets['R_year']; ?> </td>  
      <td align=center> <?php echo $otchets['R_subject']; ?> </td>
      <td align=center> <?php echo $otchets['R_avg_ball']; ?> </td>
      </tr>
  <?php endforeach; ?>
</table>