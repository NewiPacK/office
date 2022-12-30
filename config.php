<?php

define("PATH","http://localhost/office");
define("CONTR","controller/controller.php");
define("MODEL","model/model.php");
define("PAGES", PATH."/views/pages/");

global $conn;


$conn = mysqli_connect("localhost","root","root","office");