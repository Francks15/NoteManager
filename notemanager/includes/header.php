<?php 
session_start();
include('database/connection.php');
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CMS BY DARIJA CODING</title>
    <!-- Bootstrap core CSS -->
    <link href="includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/css/style.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-default main-nav">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" id="link">PHP CMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php" id="link">Home</a></li>
            <li><a href="posts.php" id="link">Articles</a></li>
            <?php 
              if(isset($_SESSION['logged']) && $_SESSION['logged'] == true):
            ?>
            <li><a href="logout.php" id="link">Logout</a></li>
            <?php 
              else:
            ?>
            <li><a href="register.php" id="link">Register</a></li>
            <li><a href="login.php" id="link">Login</a></li>
            <?php 
              endif;
            ?>
            <li><a href="contact.php" id="link">Contact</a></li>
          </ul>
          <form class="navbar-form navbar-right" method="post" action="searchPost.php">
            <input type="text" class="form-control" placeholder="Search..." name="search">
            <button class="btn btn-success xs-btn" id="btn-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </form>
        </div>
      </div>
    </nav>