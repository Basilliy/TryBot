<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

 $host = 'upperl.mysql.ukraine.com.ua'; // адрес сервера 
$database = 'upperl_vadik'; // имя базы данных
$user = 'upperl_vadik'; // имя пользователя
$password = '2shmpzez'; // пароль
$link = mysql_connect($host, $user, $password )
    or die('Не удалось соединиться: ' . mysql_error());
echo 'Соединение успешно установлено';
mysql_select_db($database) or die('Не удалось выбрать базу данных');

// Выполняем SQL-запрос
$query = 'SELECT * FROM menu';
$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
print_r($result);

// Освобождаем память от результата
mysql_free_result($result);

// Закрываем соединение
mysql_close($link);
