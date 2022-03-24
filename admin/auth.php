<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>TeaShop</title>
</head>
<body>
<?php

require '../sys/db.php';


    if(isset($_POST['go'])) {
          if ($_POST['login'] == 'admin' AND $_POST['password'] == 'admin') {
            $_SESSION['admin'] = $_POST['login'];
            header('Location: /admin/admin.php');
          } else {
            echo '<script>alert("Логин или пароль введены неверно");</script>';
        }
    }
?>
  <form method="POST">
  <div class="container">
    <h1>Панель администратора</h1>
    <hr>

    <label for="email"><b>Логин</b></label>
    <input type="text" placeholder="Введите Логин" name="login" required>

    <label for="psw"><b>Пароль</b></label>
    <input type="password" placeholder="Введите пароль" name="password" required>

    <hr>

    <button type="submit" name="go" class="registerbtn">Войти</button>
  </div>
  
</form>


 <?php
    require '../foot.php';
 ?>