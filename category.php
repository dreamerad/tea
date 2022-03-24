<?php

session_start();
require 'sys/db.php';
require 'head.php';

$sth = $dbh->prepare("SELECT * FROM `tea` WHERE `type` = :type");
$sth->execute([
    'type' => $_GET['type']
]);
$tea = $sth->fetchAll(PDO::FETCH_ASSOC);
    if($_GET['id']) {
        if($_SESSION['email']) {

        $_SESSION['id'] = $_GET['id'];
        echo "<script>alert('ok');</script>";
    } else {
        echo '<script>alert("Вам необходимо зарегистрироваться или войти");</script>';
    
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
            <div class="btn"><a href="/index.php?id=' .$val['id']. '">В корзину</a></div>
        </div>
                ';
            }
        ?>
    </section>


 <?php
    require 'foot.php';
 ?>