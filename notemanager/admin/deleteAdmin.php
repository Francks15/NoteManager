<?php
include('../database/connection.php');
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
$id = mysqli_escape_string($con,$_GET['id']);
$query = "DELETE  FROM admins WHERE id='$id'";//requete suppression
if(mysqli_query($con,$query)){
    mysqli_query($con,$query);
    header("location:admins.php?deleted");
}
