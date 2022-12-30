<?php

include_once MODEL;


if(empty($_GET['view'])){

    $view = 'index';
}
else {

    $view = $_GET['view'];
}

switch ($view)
{
    case "index":

    break;
}