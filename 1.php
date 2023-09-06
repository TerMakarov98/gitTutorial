﻿<html>
<head>
</head>
<body>

<center>


<form aсtion="1.php" method="POST">

</br></br><input type="input" name="FIO" value=""/>
</br></br><input type="input" name="ANY" value=""/>
</br></br><input type="file" name="OTHER" value=""/>
</br></br><input type="submit" name="sub" value="Add record"/>

</br></br><input type = 'submit' name='submit' value = 'Please, click me'>

</br></br><input type="input" name="id" value=""/>
</br></br><input type = 'submit' name='rem' value = 'Delete record'>


<?php 

if (isset($_POST['submit'])) {

// определяем начальные данные
   mysql_connect("vhost16926.cpsite.ru", "cp606716_nis", "kab35Ozat2013") or die (mysql_error ());

	// Выбрать БД
	mysql_select_db("cp606716_nis") or die(mysql_error());

	// SQL-запрос
	$strSQL = "SELECT * FROM journal";

	// Выполнить запрос (набор данных $rs содержит результат)
	$rs = mysql_query($strSQL);

$rs = mysql_query($strSQL);
	
echo '<br><br>';
     
// выводим на страницу сайта заголовки HTML-таблицы
  echo '<table border="1">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>ID</th>';
  echo '<th>FIO</th>';
  echo '<th>Any</th>';
  echo '<th>Other</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
 
  
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
 
 while($data = mysql_fetch_array($rs)) {
	  
    echo '<tr>';
    echo '<td>' . $data['id'] . '</td>';
    echo '<td>' . $data['FIO'] . '</td>';
    echo '<td>' . $data['ANY'] . '</td>';
      echo '<td>' . $data['OTHER']. '</td>';
    echo '</tr>';
  }
  
  echo '</tbody>';
  echo '</table>';
    

		// Закрыть соединение с БД
	mysql_close();
}
	
    if (isset($_POST['sub'])) {

    // Переменные с формы
    $id = $_POST['id'];
    $FIO = $_POST['FIO'];
    $ANY = $_POST['ANY'];
    $OTHER = $_POST['OTHER'];
     
    // Параметры для подключения
    $db_host = "vhost16926.cpsite.ru"; 
    $db_user = "cp606716_nis"; // Логин БД
    $db_password = "kab35Ozat2013"; // Пароль БД
    $db_table = "journal"; // Имя Таблицы БД
     
    // Подключение к базе данных
    $db = mysql_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
     
    // Выборка базы
    mysql_select_db("cp606716_nis",$db);
     
    // Установка кодировки соединения
    //mysql_query("SET NAMES 'utf8'",$db);
     
    $result = mysql_query ("INSERT INTO ".$db_table." (id,FIO,ANY,OTHER) VALUES (null,'$FIO','$ANY','$OTHER')");
     
    $result = false;
    if ($result = 'true'){

 echo '<br><p>';

        echo "Информация занесена в базу данных";
    }else{
        echo "Информация не занесена в базу данных";
    }
           
           // Закрыть соединение с БД
	mysql_close();
}

   
 if (isset($_POST['rem'])) {

    // Переменные с формы
    $id = $_POST['id'];
        
    // Параметры для подключения
    $db_host = "vhost16926.cpsite.ru"; 
    $db_user = "cp606716_nis"; // Логин БД
    $db_password = "kab35Ozat2013"; // Пароль БД
    $db_table = "journal"; // Имя Таблицы БД
     
    // Подключение к базе данных
    $db = mysql_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
     
    // Выборка базы
    mysql_select_db("cp606716_nis",$db);
     
    // Установка кодировки соединения
    //mysql_query("SET NAMES 'utf8'",$db);
     
    $res = mysql_query ("delete from `$db_table` where `id`=$id");
     
    $res = false;
    if ($res = 'true'){

 echo '<br><p>';

        echo "Запись удалена";
    }else{
        echo "Что-то пошло не так";
    }
           
           // Закрыть соединение с БД
	mysql_close();
}


?>

</form>


</body>
</html>