<?php

$server = 'localhost';
$user = 'root';
$pass = 'Sql2015';
$db = 'ferreteria';

$con = mysqli_connect($server, $user, $pass, $db);

if (!$con) {
    die('No se conecto la base de datos'. mysqli_error());
}

//echo 'Se conecto a la base de datos';

