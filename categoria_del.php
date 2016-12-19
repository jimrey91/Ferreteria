
<?php
include 'function/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];   
}

    $sql = "DELETE FROM categoriaprod where idcategoria= $id";
    $res = mysql_query($con, $sql);
    header("location:categoria.php");


