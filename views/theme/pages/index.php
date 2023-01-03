
<?php if(isset($_COOKIE['id'])){?>
        <h1>Забронируйте кабинет для себя</h1>
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
    <a href="?view=unset_user&id=<?php echo $_COOKIE['id']?>">Выйти из профиля</a>
<?php }else{ ?>
    <h1>Создайте учетную запись или войдите в существующую</h1>
    <h2><a href="?view=auth">Авторизоваться</a></h2>
    <h2><a href="?view=reg">Зарегистрироваться</a></h2>
<?php } ?>


