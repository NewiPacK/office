<?php

include MODEL;


if(empty($_GET['view']))
{
    $view = 'index';
} else {
    $view = $_GET['view'];
}

switch ($view)
{
    case "index":

        $cab = cabinets();

        break;

    case "cabinet":

        $id = $_GET['id'];

        $cab = cabinets_id($id);

        if($cab['status'] != 0) {
            $reserves = reserves($id);
        }

    case "reg":

        reg();

        break;

    case "auth":

        auth();

        break;

    case "unset_user":

        $id = $_GET['id'];

        setcookie("id", $id, time() - 3600);

        header("location:?view=index");

        break;

    case "add_reserve":

        $id = $_GET['id'];

        add_reserve($id);

        header("location:?view=cabinet&id=$id");

        break;
}


include $_SERVER['DOCUMENT_ROOT']."/office/views/theme/index.php";
