<?php

session_start();
require 'sys/db.php';
require 'head.php';
$sth = $dbh->prepare("SELECT * FROM `tea` ORDER BY `name`");
$sth->execute();
$tea = $sth->fetchAll(PDO::FETCH_ASSOC);
    if($_GET['name']) {
        if($_SESSION['email']) {
        $sth = $dbh->prepare("INSERT INTO `basket` SET `email_user` = :email_user,
         `name` = :name, `price` = :price, `src` = :src");
        $sth->execute([
            'email_user' => $_SESSION['email'],
            'name' => $_GET['name'],
            'price' => $_GET['price'],
            'src' => $_GET['src'],
    ]);
    $sth = $dbh->prepare("INSERT INTO `admin_basket` SET `email_user` = :email_user,
    `name` = :name, `price` = :price, `src` = :src");
    $sth->execute([
        'email_user' => $_SESSION['email'],
        'name' => $_GET['name'],
        'price' => $_GET['price'],
        'src' => $_GET['src'],
 ]);
 
    echo '<script>alert("Товар добавлен в корзину");</script>';
    } else {
        echo '<script>alert("Вам необходимо авторизироваться");</script>';

    }
} 
?>
    <section class="shop">
        <?php
            foreach ($tea as $val) {
                echo '
                <div class="block">
            <img src="/style/img/' .$val['src']. '" alt="">
            <div class="title"><a href="/subject.php?sub=' .$val['id']. '">' .$val['name']. '</a></div>
            <div class="price">' .$val['price']. ' руб.</div>
            <div class="btn"><a href="/index.php?name=' .$val['name']. '&price=' .$val['price']. '&src=' .$val['src']. '">В корзину</a></div>
        </div>
                ';
            }
        ?>
    </section>


 <?php
    require 'foot.php';
 ?>