<?php

session_start();
require 'sys/db.php';
require 'head.php';

$sth = $dbh->prepare("SELECT * FROM `basket` WHERE `email_user` = :email");
$sth->execute([
    'email' => $_SESSION['email']
]);
$basket = $sth->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['go'])) {
        $email = $_SESSION['email'];
       
        $sth = $dbh->exec("DELETE FROM `basket` WHERE `email_user` = '$email'");
   
        echo '<script>alert("Ваш заказ направлен на обработку, администратор оповестит вас сообщением на ваш Email");</script>';

    }
?>

<section class="basket">
    <div class="sec">
    <table class="table" >
        
    <tr>
			<th>Изображение</th>
			<th>Название</th>
			<th>Цена</th>
		</tr>
        <tbody>

        <?php
        foreach ($basket as $val) {
                echo '


		<tr>
			<td style="padding-left:50px;"><img src="/style/img/' .$val['src']. '" alt="" style="width:65px; height: 65px;"></td>
			<td>' .$val['name']. '</td>
			<td>' .$val['price']. '</td>
		</tr>
       
                ';
        }
            
        ?>

        	</tbody>

       </table>
       <form method="POST">
       <button type="submit" name="go" class="registerbtn">Оформить</button>
       </form>
    </div>
</section>

<?php
    require 'foot.php';
?>