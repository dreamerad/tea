<?php

session_start();
require 'sys/db.php';
require 'head.php';

$sth = $dbh->prepare("SELECT * FROM `tea` WHERE `id` = :id");
$sth->execute([
    'id' => $_GET['sub']
]);
$tea = $sth->fetch(PDO::FETCH_ASSOC);

if($_GET['id']) {
    $_SESSION['id'] = $_GET['id'];
    echo "<script>alert('ok');</script>";
}
?>


<section class="object">
    <div class="sec">
        <div class="img" align="top"><img src="/style/img/1.jpg" alt=""></div>
        <div class="obj" >
            <div class="title"><?php echo $tea['name']; ?></div>
            <div class="gram">Цена за 50гр.</div>
            <div class="price"><?php echo $tea['price']; ?> руб.</div>
            <div class="desc"><?php echo $tea['desc']; ?></div>
            <div class="btn"><a href="/subject.php?id=' .$val['id']. '">В корзину</a></div>
        </div>
    </div>
</section>




<?php
    require 'foot.php';
 ?>