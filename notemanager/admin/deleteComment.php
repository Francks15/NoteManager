<?php
include('../database/connection.php');
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
$id = mysqli_escape_string($con,$_GET['id']);//suppression comment
$query = "DELETE  FROM comments WHERE id='$id'";
if(mysqli_query($con,$query)){
    mysqli_query($con,$query);
    header("location:commentaires.php?deleted");
}
