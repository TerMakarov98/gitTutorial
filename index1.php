﻿﻿﻿<html>
<head>
</head>
<body>

<center>


<form aсtion="" method="post">

<h5>Заголовок для новой записи </h5> <!--ФАМИЛИЯ-->
<input type="input" name="FIO" value=""/>
<h5>Информация</h5>
<textarea cols="40" rows="15" name="Adress" value=""/></textarea> <!--Адрес-->
<h5>Добавил новость</h5>
<input type="input" name="Phone" value=""/> <!--Телефон-->


</br></br><input type="submit" name="sub" value="Add record"/>

<h5>Для отображения таблицы нажмите кнопку ниже</h5>
<input type = 'submit' name='submit' value = 'Please, click me'>

</br></br><input type="input" name="id" value=""/>


<h5>Удаление записи с номером введеном в поле ниже</h5>
<input type = 'submit' name='rem' value = 'Delete record'>


<?php 

if (isset($_POST['submit'])) {

// определяем начальные данные
   
// Переменные с формы
    $id = $_POST['id'];
    $FIO = $_POST['FIO'];
    $ANY = $_POST['Adress'];
    $OTHER = $_POST['Phone'];
     
    // Параметры для подключения
    $db_host = "vhost16926.cpsite.ru"; 
    $db_user = "cp606716_alex"; // Логин БД
    $db_password = "kab35Ozat2013"; // Пароль БД
    $db_table = "phone"; // Имя Таблицы БД
     
    // Подключение к базе данных
    $db = mysql_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
     
    // Выборка базы
    mysql_select_db("cp606716_alex",$db);
     
    // Установка кодировки соединения
    //mysql_query("SET NAMES 'utf8'",$db);

	$strSQL = "SELECT * FROM phone";

	// Выполнить запрос (набор данных $rs содержит результат)
	$rs = mysql_query($strSQL);

$rs = mysql_query($strSQL);
	
echo '<br><br>';
     
// выводим на страницу сайта заголовки HTML-таблицы
  echo '<table border="1">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>№</th>';
  echo '<th>ФИО</th>';
  echo '<th>Адрес</th>';
  echo '<th>Телефон</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
 
  
   // выводим в HTML-таблицу все данные клиентов из таблицы MySQL 
 
 while($data = mysql_fetch_array($rs)) {
	  
    echo '<tr>';
    echo '<td>' . $data['id'] . '</td>';
    echo '<td>' . $data['FIO'] . '</td>';
    echo '<td>' . $data['Adress'] . '</td>';
    echo '<td>' . $data['Phone'] . '</td>';
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
    $Adress= $_POST['Adress'];
    $Phone= $_POST['Phone'];
     
    // Параметры для подключения
    $db_host = "vhost16926.cpsite.ru"; 
    $db_user = "cp606716_alex"; // Логин БД
    $db_password = "kab35Ozat2013"; // Пароль БД
    $db_table = "phone"; // Имя Таблицы БД
     
    // Подключение к базе данных
    $db = mysql_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
     
    // Выборка базы
    mysql_select_db("cp606716_alex",$db);
     
    // Установка кодировки соединения
    //mysql_query("SET NAMES 'utf8'",$db);
     
    $result = mysql_query ("INSERT INTO ".$db_table." (id,FIO,Adress,Phone) VALUES (null,'$FIO','$Adress','$Phone')");
     
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
    $db_user = "cp606716_alex"; // Логин БД
    $db_password = "kab35Ozat2013"; // Пароль БД
    $db_table = "phone"; // Имя Таблицы БД
     
    // Подключение к базе данных
    $db = mysql_connect($db_host,$db_user,$db_password) OR DIE("Не могу создать соединение ");
     
    // Выборка базы
    mysql_select_db("cp606716_alex",$db);
     
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

	<p><a href="logout.php">Выйти</a> из системы</p>


</body>
</html>