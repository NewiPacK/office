<?php

include MODEL;


if(empty($_GET['view'])){

    $view = 'index';
}
else {

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

        $reserves = reserves($id);

    case "reg":

        reg();

        break;

    case "auth":

        auth();

        break;

    case "addreserve":

        $id = $_GET['id'];

        add_reserve($id);

        header("location:?view=index");

        break;
}


include $_SERVER['DOCUMENT_ROOT']."/office/views/theme/index.php";
