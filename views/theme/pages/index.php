
<?php if(isset($_COOKIE['id'])){?>
<form method="POST">
<table  border="1">
    <tr>
        <td>Название кабинета</td>
        <td>Узнать подробнее</td>
    </tr>
    <?php foreach ($cab as $item){?>
        <tr>
           <td><?php echo $item['title']?></td>
           <td><a href="?view=cabinet&id=<?php echo $item['id']?>">Подробнее</a></td>
        </tr>
    <?php } ?>
</table>
</form>
<?php }else{ ?>
    <h2>Для бронирования авторизуйтесь или зарегестрируйтесь</h2>
    <a href="?view=auth">Авторизоваться</a>
    <a href="?view=reg">Зарегестрироваться</a>
<?php } ?>

