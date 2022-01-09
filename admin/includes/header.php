<?php 
session_start();
include('../database/connection.php');
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Administrateur</title>
    <!-- Bootstrap core CSS -->
    <link href="../includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="../includes/css/style.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-default admin-nav">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"> navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php" id="link">Administrateur</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="../index.php" id="link">page utilisateur</a></li>
        </ul>
      </div>
    </nav>