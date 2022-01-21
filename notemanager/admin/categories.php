<?php include('includes/header.php');?>
<?php
if(!isset($_SESSION['admin'])){
  header("location:login.php");
}
$query = "SELECT * FROM module";
?>
<div class="container-fluid">
    <div class="row" style="margin-top: 30px;">
        <div class="col-sm-3 col-md-2 sidebar">
           <?php include('includes/sidebar.php');?>
        </div>
        <div class="col-sm-6 col-md-8 col-md-offset-1 col-sm-offset-1 main">
          <h2 class="sub-header text-primary">UE et niveau correspondants</h2>
          <hr>
          <?php
              if(isset($_GET['deleted'])){
                  echo '<div class="alert alert-success">categorie supprimée</div><br>';
              }
          ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Niveau</th>
                  <th>Codeu</th>
                  <th>Ajoute par</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if(mysqli_query($con,$query)):
                    $result = mysqli_query($con,$query);
                    while($row = $result->fetch_assoc()):
              ?>
                <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['level'];?></td>
                  <td><?php echo $row['codeu'];?></td>
                  <td><?php echo $row['added_by'];?></td>
                  <td><a href="editCategory.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-xs" style="margin:2px;"><i class="glyphicon glyphicon-pencil"></i></a> <a href="deleteCategory.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs" style="margin:2px;"><i class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
              <?php
                  endwhile;
                  endif;
              ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>
