<?php

function add_reserve($id)
{
    $user_id = $_COOKIE['id'];
    $user = users($user_id);

    $name = $user['name'];
    $phone = $user['phone'];
    $email = $user['email'];
    $cabinet = $_GET['id'];

    global $conn;

    mysqli_query($conn, "UPDATE cabinets SET status = 1, date = CURRENT_TIMESTAMP + INTERVAL 2 minute WHERE id = $id");

    mysqli_query($conn,"INSERT INTO reserves (name, email, phone, cabinet, date) VALUES ('$name', '$phone', '$email', '$cabinet', CURRENT_TIMESTAMP + INTERVAL 2 minute)");

}

function reserves($id)
{
        global $conn;

        $res = mysqli_query($conn,"SELECT id, name, date FROM reserves WHERE cabinet = $id");

        $row =  mysqli_fetch_assoc($res);

        if($row['date'] < date('Y-m-d H:i:s')){

        mysqli_query($conn, "DELETE FROM reserves WHERE cabinet = $id");

        }else{
            return $row;
        }
}

function  users($userid)
{
    global $conn;

    $res = mysqli_query($conn, "SELECT * FROM users WHERE id = $userid");

    $row = mysqli_fetch_assoc($res);

    return $row;
}

function cabinets_id($id)
{
    global $conn;

    $res = mysqli_query($conn,"SELECT * FROM cabinets WHERE id = $id");

    $row = mysqli_fetch_assoc($res);

    if($row['date'] <= date('Y-m-d H:i:s')){

        mysqli_query($conn, "UPDATE cabinets SET status = 0 WHERE id = $id");
    }

    return $row;
}

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

        mysqli_query($conn,"INSERT INTO `users` (`login`, `password`, `name`, `email`, `phone` ) VALUES ('$login', '$password', '$name', '$phone', '$email' )");

        header("location:?view=auth");
    }
}

function auth()
{
    global $conn;

    if($_POST) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $res = mysqli_query($conn,"SELECT * FROM users WHERE  login = '$login' AND password = '$password'");

        $row = mysqli_fetch_assoc($res);

        if(mysqli_num_rows($res)>0){

            $id = $row['id'];

            setcookie("id", $id, time() + 3600);

            header("location:index.php");

        }else{

            header("location:?view=auth");

        }
    }
}

