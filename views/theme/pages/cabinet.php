<meta http-equiv="refresh" content="1">
<form method="POST">
<table  border="1">
    <tr>
        <td>Название кабинета</td>
        <td>Статус резерва</td>
        <td>Кем забронирован</td>
        <td>Когда освободится</td>
        <td>Вернуться ко всем кабинетам</td>
    </tr>
        <tr>
           <td><?php echo $cab['title']?></td>
            <?php
                if($cab['status'] == 1){
                    echo "<td>Забронирован</td>";
                }else{?>
                    <td><a href="?view=add_reserve&id=<?php echo $cab['id']?>">Забронировать</a></td>
                <?php } ?>
                <?php if($cab['status'] == 1){?>
                    <td><?php echo $reserves['name']?></td>
                <?php }else{?>
                    <td>--</td>
                <?php } ?>

                <?php if($cab['status'] == 1){?>
                    <td><?php
                        echo $reserves['date']?></td>
                <?php }else{?>
                    <td>--</td>
                <?php } ?>
            <td><a href="?view=index">Назад</a></td>
        </tr>
</table>
    <h1>Кабинеты бронируются не более, чем на 2 минуты!</h1>
</form>

<?php
$a = date('Y-m-d H:i:s');
echo "<h1>Текущее время сервера:</h1>" . $a;

?>
