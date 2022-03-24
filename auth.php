<?php

session_start();
require 'sys/db.php';
require 'head.php';


    if(isset($_POST['go'])) {
        $errors = [];
        if (empty($_POST['email']) OR empty($_POST['password'])) {
            $errors = 1;
            echo '<script>alert("Все поля обязательны для заполения");</script>';
        }

            
        if(empty($errors)) {
            $sth = $dbh->prepare("SELECT `password` FROM `users` WHERE `email` = :email");
            $sth->execute([
                'email' => $_POST['email']
            ]);
            $password = $sth->fetch(PDO::FETCH_COLUMN);
            if($_POST['password'] == $password) {
                $_SESSION['email'] = $_POST['email'];
                header("Location: /index.php");
            } else {
                echo '<script>alert("Пароль или email введены не верно");</script>';
            }
        }
    }
?>
  <form method="POST">
  <div class="container">
    <h1>Авторизация</h1>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Введите Email" name="email" required>

    <label for="psw"><b>Пароль</b></label>
    <input type="password" placeholder="Введите пароль" name="password" required>

    <hr>

    <button type="submit" name="go" class="registerbtn">Войти</button>
  </div>
  
</form>


 <?php
    require 'foot.php';
 ?>