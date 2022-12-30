<?php

function cabinets()
{
    global $conn;

    $res = mysqli_query($conn,"SELECT * FROM cabinets");

    $arr = array();
    while($row = mysqli_fetch_assoc($res)){


        $arr[] = $row;
    }
    return $arr;
}

function reg()
{
    global $conn;

    if($_POST)
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
    }

    mysqli_query($conn,"INSERT INTO `users` (`login`, `password`, `name`, `email`, `phone` ) VALUES ('$login', '$password', '$name', '$phone', '$email' )");

    header("location:?view=auth");
}
