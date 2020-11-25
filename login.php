<?php
session_start();
require("functions.php");

$user_email = $_POST["user_email"];
$user_password = $_POST["user_password"];
$connection = new PDO("mysql:host=localhost; dbname=profiles; charset=utf8", "root", "");

/*
Если email и пароль верные,
перенаправляем на страницу users
*/
if (login($connection, $user_email, $user_password)) {
    redirect_to("/tasks2/users.html");

/*
Если email или пароль неверные,
возвращаем на страницу логина
и показываем флеш сообщение
*/    
} else {
    set_flash_message("danger", "Неверный логин или пароль!");
    redirect_to("/tasks2/page_login.php");
}