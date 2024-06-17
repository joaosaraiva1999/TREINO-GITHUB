<?php
$db_name="bd_vp";
$server="localhost";
$user="root";
$pass="";
$conn = mysqli_connect($server,$user,$pass,$db_name);
if(mysqli_connect_error()){
    echo"Falha na coneção a Base de Dados: " . mysqli_connect_error();
    exit();
}
