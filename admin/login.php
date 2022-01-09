<?php 
include('includes/header.php');
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
    header("location:dashboard.php");
}
$errors =[];
$message = "";
if(isset($_POST['submit'])){
    $email = mysqli_escape_string($con,$_POST['email']);
    $password = mysqli_escape_string($con,sha1($_POST['password']));
    if(empty($_POST['email'])){
        $errors = "The email field is required";
    }else if(empty($_POST['password'])){
        $errors = "The password field is required";
    }else{
        $query = "SELECT * FROM admins WHERE email = '$email' AND password ='$password' LIMIT 1";
        if(mysqli_query($con,$query)){
            $data = mysqli_query($con,$query);
            $user = $data->num_rows;
            if($user == 1){
                $row = $data->fetch_assoc();
                $_SESSION['admin'] = true;
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                header("location:dashboard.php");
            }else{
                $message = '<div class="alert alert-danger">
                                    Invalid Credentials
                            </div>';
            }
        }else{
            echo '<div class="alert alert-danger">Something went wrong'.mysqli_error($con).'</div>';
        }
    }
}
?>
<div class="container">
    <div class="row" style="margin-top:50px">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" style="padding:10px;">
            <h3 class="text-info">Login</h3>
            <hr>
                <?php 
                    if(!empty($errors)){
                        echo '<div class="alert alert-danger">
                                '.$errors.'
                            </div><br>';
                    }else{
                        echo $message;
                    }
                ?>
                <form  method="post" action="login.php">
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>