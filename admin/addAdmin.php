<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
include('../database/connection.php');
$errors =[];
$name = mysqli_escape_string($con,$_POST['name']);
$email = mysqli_escape_string($con,$_POST['email']);
$password = mysqli_escape_string($con,sha1($_POST['password']));
$created = date('Y-m-d H:s:m');
$added_by = $_SESSION['admin_name'];
if(empty($_POST['name'])){
    $errors = "Veuillez remplir le champ nom & prénom";
}else if(empty($_POST['email'])){
    $errors = "Veuillez remplir le champ email";
}else if(empty($_POST['password'])){
    $errors = "Veuillez remplir le champ mot de passe";
}
if(!empty($errors)){
    echo '<div class="alert alert-danger">
            '.$errors.'
        </div><br>';
}else{
    $query = "INSERT INTO admins (name,email,password,created,added_by) values('$name','$email','$password','$created','$added_by')";
    if(mysqli_query($con,$query)){
        echo $message = '<div class="alert alert-success">
                   Admin ajouté avec succés 
              </div>';
    }else{
         echo '<div class="alert alert-danger">Une erreur est survenue'.mysqli_error($con).'</div>';
    }
}
?>