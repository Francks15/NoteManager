<?php include('includes/header.php');?>
<?php
if(!isset($_SESSION['admin'])){
  header("location:login.php");
}
$query = "SELECT * FROM professeurs";
?>
<div class="container-fluid">
    <div class="row" style="margin-top: 30px;">
        <div class="col-sm-3 col-md-2 sidebar">
           <?php include('includes/sidebar.php');?>
        </div>
        <div class="col-sm-6 col-md-8 col-md-offset-1 col-sm-offset-1 main">
          <h2 class="sub-header text-primary">Posts</h2>
          <?php
              if(isset($_GET['deleted'])){
                  echo '<div class="alert alert-success">Post deleted</div><br>';
              }
          ?>
          <hr>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Author</th>
                  <th>Image</th>
                  <th>Created at</th>
                  <th>Action</th>
                  <th>Read</th>
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
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo substr($row['body'],0,100).'...';?></td>
                  <td><?php echo $row['author'];?></td>
                  <td><img src="images/<?php echo $row['image'];?>" alt="" height="50" width="50"></td>
                  <td><?php echo $row['created'];?></td>
                  <td><a href="editPost.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-xs" style="margin:2px;"><i class="glyphicon glyphicon-pencil"></i></a> <a href="deletePost.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs" style="margin:2px;"><i class="glyphicon glyphicon-trash"></i></a></td>
                  <td><a href="../viewPost.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-xs" style="margin:2px;"><i class="glyphicon glyphicon-eye-open"></i></a></td>
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