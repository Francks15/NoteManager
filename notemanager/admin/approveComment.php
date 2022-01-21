<?php
include('../database/connection.php');
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
$id = mysqli_escape_string($con,$_GET['id']);
$query = "UPDATE comments  set status = 1  WHERE id='$id'";//mise a jour requete
if(mysqli_query($con,$query)){
    mysqli_query($con,$query);
    header("location:commentaires.php");
}
