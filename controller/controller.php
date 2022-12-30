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

    case "reg":

        reg();

    break;
}


include $_SERVER['DOCUMENT_ROOT']."/office/views/theme/index.php";
