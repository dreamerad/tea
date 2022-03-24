<?php

session_start();
require 'sys/db.php';
require 'head.php';


    if(isset($_POST['go'])) {
        var_dump($_POST);
        $errors = [];
        if (empty($_POST['email']) OR empty($_POST['password']) OR empty($_POST['fio']) OR 
        empty($_POST['tel']) OR empty($_POST['address'])) {
            $errors = 1;
            echo '<script>alert("Все поля обязательны для заполения");</script>';
        }
        if ($_POST['password'] != $_POST['passwordtwo']) {
            $errors = 1;
            echo '<script>alert("Все поля обязательны для заполения");</script>';
        }

        if(empty($errors)) {
            $_SESSION['email'] = $_POST['email'];
            $sth = $dbh->prepare("INSERT INTO `users` SET `email` = :email, `password` = :password
            , `fio` = :fio, `tel` = :tel, `address` = :address");
            $sth->execute([
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'fio' => $_POST['fio'],
                'tel' => $_POST['tel'],
                'address' => $_POST['address']
            ]);
            header("Location: /auth.php");
        }
    }
?>
  <form method="POST">
  <div class="container">
    <h1>Регистрация</h1>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Введите Email" name="email" required>

    <label for="psw"><b>Пароль</b></label>
    <input type="password" placeholder="Введите пароль" name="password" required>

    <label for="psw"><b>Подтвердите пароль</b></label>
    <input type="password" placeholder="Подтвердите пароль" name="passwordtwo" required>

    <label for="psw"><b>Ф.И.О.</b></label>
    <input type="text" placeholder="Введите Ф.И.О." name="fio" required>

    <label for="psw"><b>Номер телефона</b></label>
    <input type="text" placeholder="Введите номер телефона" name="tel" required>

    <label for="psw-repeat"><b>Адрес доставки</b></label>
    <input type="text" placeholder="Введте адрес" name="address" required>
    <hr>

    <button type="submit" name="go" class="registerbtn">Регистарция</button>
  </div>
  
</form>


 <?php
    require 'foot.php';
 ?>