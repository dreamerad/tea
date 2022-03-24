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
<nav>
        <img src="../style/img/nav.jpg" alt="">
        <div class="menu">
            <a href="/category.php?type=Зелёный чай">Зелёный чай</a>
            <a href="/category.php?type=Чёрный чай">Чёрный чай</a>
            <a href="/category.php?type=Синий чай">Синий чай</a>
            <a href="/category.php?type=Фруктовый чай">Фруктовый чай</a>
            <a href="/category.php?type=Пуэр">Пуэр</a>
            <?php 
                if(isset($_SESSION['admin'])) {
                    echo '<a href="/out.php">Выход</a>';

                }
            ?>
            

        </div>
    </nav>
<?php

session_start();
require '../sys/db.php';

$sth = $dbh->prepare("SELECT * FROM `admin_basket` WHERE `email_user` = :email");
$sth->execute([
    'email' => $_SESSION['email']
]);

$basket = $sth->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sth = $dbh->exec("DELETE FROM `admin_basket` WHERE `id` = '$id'");
        
        echo '<script>alert("Заказ удалён");</script>';
    }
?>

<section class="basket">
    <div class="sec">
    <table class="table" >
        
    <tr>
			<th>ID</th>
			<th>Email</th>
			<th>Изображение</th>
			<th>Название</th>
			<th>Цена</th>
			<th>Действие</th>
		</tr>
        <tbody>

        <?php
        foreach ($basket as $val) {
                echo '
		<tr>
			<td>' .$val['id']. '</td>
			<td>' .$val['email_user']. '</td>
			<td style="padding-left:50px;"><img src="/style/img/' .$val['src']. '" alt="" style="width:65px; height: 65px;"></td>
			<td>' .$val['name']. '</td>
			<td>' .$val['price']. '</td>
			<td><a href="/admin/admin.php?id='.$val['id'].'" style="text-decoration:none; color: blue;">Подтвердить доставку</a></td>';
			
            echo'</tr>';
        }
            
        ?>

        	</tbody>

       </table>

    </div>
</section>

<?php
    require '../foot.php';
?>