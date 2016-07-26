<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

 $host = 'upperl.mysql.ukraine.com.ua'; // адрес сервера 
$database = 'upperl_vadik'; // имя базы данных
$user = 'upperl_vadik'; // имя пользователя
$password = '2shmpzez'; // пароль
$link = mysqli_connect($host, $user, $password,$database )
    or die('Не удалось соединиться: ' . mysql_error());
//echo 'Соединение успешно установлено';

// Выполняем SQL-запрос
$query = 'SELECT * FROM menu';
$result = $link->query($query) or die('Запрос не удался: ' . mysql_error());
//print_r($result);
$rows = $result->fetch_assoc();
print_r($rows);
// Закрываем соединение
$link->close();
