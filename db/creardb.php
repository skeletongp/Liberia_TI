<?php 
$server='localhost';
$user='root';
$pass='';
session_start();
$db=$_SESSION['nuevousuario'];
$conex=mysqli_connect($server,$user,$pass);
$crear='CREATE DATABASE '.$db.';';
if (mysqli_query($conex,$crear)) {
    echo 'hecho';
 header('location:../home.php');
}else{
    echo 'Error al crear la database';
}

?>