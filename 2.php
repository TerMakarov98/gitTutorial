﻿<html>
<head>
</head>
<body>


<form aсtion="2.php" method="POST">


<?php 

// определяем начальные данные
   mysql_connect("vhost16926.cpsite.ru", "cp606716_alex", "kab35Ozat2013") or die (mysql_error ());

	// Выбрать БД
	mysql_select_db("cp606716_alex") or die(mysql_error());

	// SQL-запрос
	$strSQL = "SELECT * FROM phone";

	// Выполнить запрос (набор данных $rs содержит результат)
	$rs = mysql_query($strSQL);

$rs = mysql_query($strSQL);
	
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
 
// выводим на страницу сайта заголовки HTML-таблицы
  echo '<table border="1" cellspacing="0" cellpadding="0" width = "628" height="0" bgcolor="springgreen">';
  echo '<tbody>';
 
  
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
 
 while($data = mysql_fetch_array($rs)) {
	  
    echo '<tr bgcolor="white">';
    echo '<td>' . $data['FIO'] . '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td>' . $data['Adress'] . '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<td>' . $data['Phone'] . '</td>';
    echo '</tr>';
  
  }
  
  echo '</tbody>';
  echo '</table>';
    

		// Закрыть соединение с БД
	mysql_close();

?>

</form>


</body>
</html>