<?php include('includes/header.php');?>
<?php 
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
$errors = [];
$message = "";
if(isset($_POST['submit'])){
    if(empty($_POST['title'])){
        $errors = "The title field is required";
    }else if(empty($_POST['codep'])){
        $errors = "The code field is required";}
    else if(empty($_POST['body'])){
        $errors = "The body field is required";
    } else if(empty($_POST['email'])){
        $errors = "The email field is required";
    } else if(empty($_POST['sexe'])){
        $errors = "The sexe field is required";
    }else if(empty($_POST['categorie'])){
        $errors = "The category field is required";}
    else{
        $title = mysqli_escape_string($con,$_POST['title']);//nom professeur
        $codep = mysqli_escape_string($con,$_POST['codep']);//code professeur
        $body = mysqli_escape_string($con,$_POST['body']); //reference 
        $categorie = mysqli_escape_string($con,$_POST['categorie']); //eu enseigne
        $sexe = mysqli_escape_string($con,$_POST['sexe']);
        $email = mysqli_escape_string($con,$_POST['email']);
        $image = mysqli_escape_string($con,$_FILES['image']["name"]);//photo
        $cv = mysqli_escape_string($con,$_FILES['cv']["name"]);//importer son cv
        //upload image to images
        $directory = "images/";
        $file = $directory.basename($_FILES["image"]["name"]);//image
        $filecv = $directory.basename($_FILES["cv"]["name"]);//image
        $author =  $_SESSION['admin_name'];   //person qui l'enregistre 
        $created = date('Y-m-d H:s:m');//date d'eregistrement
        $query = "INSERT INTO professeurs (title,codep,body,image,cv,author,category_id,created,sexe,email) values('$title','$codep','$body','$image','$cv','$author','$categorie','$created','$sexe','$email')";
        if(mysqli_query($con,$query)){
            move_uploaded_file($_FILES["image"]["tmp_name"], $file);
            move_uploaded_file($_FILES["cv"]["tmp_name"], $filecv);
            $message = '<div class="alert alert-success">
                       Poste ajoute
                  </div>';
        }else{
             echo '<div class="alert alert-danger">Something went wrong'.mysqli_error($con).'</div>';
        }
    }
}
?>
<div class="container-fluid">
    <div class="row" style="margin-top: 30px;">
        <div class="col-sm-3 col-md-2 sidebar">
           <?php include('includes/sidebar.php');?>
        </div>
            <div class="col-sm-6 col-md-6 col-md-offset-1 col-sm-offset-1 main">
            <h2 class="sub-header text-primary">Enregistrer Professeur</h2>
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
                <form action="addPost.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="categorie">Post Professeur</label>
                        <select name="categorie" id="categorie" class="form-control">
                            <option  selected="" disabled>Votre unité d'enseignement</option>
                            <?php
                                $query = "SELECT * FROM module";
                                if(mysqli_query($con,$query)):
                                    $result = mysqli_query($con,$query);
                                    while($row = $result->fetch_assoc()):
                            ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                            <?php
                                endwhile;
                                endif;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Nom: </label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Professeur">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email Professeur: </label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Professeur Email">
                    </div>
                    <div class="form-group">
                        <label for="title">CodeProfesseur: </label>
                        <input type="password" class="form-control" name="codep" id="codep" placeholder="Professeur">
                    </div>
                    
                    <div class="form-group">
                        <label for="body">Vos references</label>
                        <textarea  class="form-control" rows="5" cols="30" name="body" id="body" placeholder="Grade Nationalite Sexe"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe: </label>
                       Male <input type="radio" class="form-control" name="sexe" value="M" id="sexe">
                       Female <input type="radio" class="form-control" name="sexe" value="F" id="sexe">
                    </div>
                    <div class="form-group">
                        <label for="image">Photo:</label>
                        <input type="file" class="form-control" name="image" id="image">

                        <label for="cv">Votre CV</label>
                        <input type="file" class="form-control" name="cv" id="cv">
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