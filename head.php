<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>TeaShop</title>
</head>
<body>
    <nav>
        <img src="style/img/nav.jpg" alt="">
        <div class="menu">
            <a href="/category.php?type=Зелёный чай">Зелёный чай</a>
            <a href="/category.php?type=Чёрный чай">Чёрный чай</a>
            <a href="/category.php?type=Синий чай">Синий чай</a>
            <a href="/category.php?type=Фруктовый чай">Фруктовый чай</a>
            <a href="/category.php?type=Пуэр">Пуэр</a>
            <a href="/basket.php">Корзина</a>
            <?php 
                if(isset($_SESSION['email'])) {
                    echo '<a href="/out.php">Выход</a>';

                } else {
                    echo '
                    <a href="/auth.php">Вход</a>
                    <a href="/reg.php">Регистрация</a>
                    ';
                }
            ?>
            

        </div>
    </nav>