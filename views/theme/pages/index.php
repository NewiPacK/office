
<?php if(isset($_COOKIE['id'])){?>
<form method="POST">
<table  border="1">
    <?php foreach ($cab as $item){?>
    <tr>
        <td>Название кабинета</td>
        <td>Статус резерва</td>
        <td>Кем занят</td>
        <td>Когда освободится</td>
        <td>Забронировать</td>
    </tr>
        <tr>
            <td><?php echo $item['title']?></td>
            <td><?php
                if($item['status'] == 1){
                    echo "Кабинет забронирован";
                }else{
                    echo "Кабинет свободен";
                }
                ?></td>
            <td></td>
            <td></td>
            <td><input type="submit" value="Забронировать"/> </td>
        </tr>
    <?php } ?>
</table>
</form>
<?php }else{ ?>
    <h2>Для бронирования авторизуйтесь или зарегестрируйтесь</h2>
    <a href="?view=auth">Авторизоваться</a>
    <a href="?view=reg">Зарегестрироваться</a>
<?php } ?>