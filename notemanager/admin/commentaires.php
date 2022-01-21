<?php include('includes/header.php');?>
<?php
//zone2 de requetes
if(!isset($_SESSION['admin'])){
  header("location:login.php");
}
$query = "SELECT * FROM comments";
?>
<div class="container-fluid">
    <div class="row" style="margin-top: 30px;">
        <div class="col-sm-3 col-md-2 sidebar">
           <?php include('includes/sidebar.php');?>
        </div>
        <div class="col-sm-6 col-md-8 col-md-offset-1 col-sm-offset-1 main">
          <h2 class="sub-header text-primary">Requetes</h2>
          <hr>
          <?php
              if(isset($_GET['deleted'])){
                  echo '<div class="alert alert-success">Comment deleted</div><br>';
              }
          ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Matricule</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Requete etudiant</th>
                  <th>Statut</th>
                  <th>Created at</th>
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
                  <td><?php echo $row['matricule'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['comment'];?></td>
                  <td><?php echo ($row['status'] == 1) ? '<div class="label label-success">Approved</div>' : '<div class="label label-danger">Waiting...</div>';?></td>
                  <td><?php echo $row['created'];?></td>
                  <td>
                     <a href="deleteComment.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs" style="margin:2px;"><i class="glyphicon glyphicon-trash"></i></a>
                      <?php
                        if($row['status'] == 0):
                      ?>
                     <a href="approveComment.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-xs" style="margin:2px;" title="Publish"><i class="glyphicon glyphicon-eye-open"></i></a>
                     <?php
                        else:
                      ?>
                     <a href="disapproveComment.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-xs" style="margin:2px;" title="Hide"><i class="glyphicon glyphicon-eye-close"></i></a>
                     <?php
                        endif;
                      ?>
                  </td>
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
