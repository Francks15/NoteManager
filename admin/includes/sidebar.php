<?php
$unpublished = "SELECT * FROM comments WHERE status = 0";
?>
<ul class="nav nav-sidebar list-group">
    <li class="active"><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
    <li><a href="addPost.php"><i class="glyphicon glyphicon-plus-sign"></i> Ajouter Professeur <span class="sr-only">(current)</span></a></li>
    <li><a href="posts.php"><i class="glyphicon glyphicon-list-alt"></i> Liste Professeurs</a></li>
    <li><a href="addCategorie.php"><i class="glyphicon glyphicon-plus-sign"></i> Ajouter UE</a></li>
    <li><a href="categories.php"><i class="glyphicon glyphicon-tags"></i> UE et enseignant Responsable</a></li>
    <li><a href="commentaires.php">
        <i class="glyphicon glyphicon-comment"></i>
        Comments
        <?php
            if(mysqli_query($con,$unpublished)):
                $data = mysqli_query($con,$unpublished);
                $unpublishedComments = $data->num_rows;
        ?>
        <span class="label label-warning">
            <?php
                echo $unpublishedComments;
            ?>
        </span>
        <?php
            endif;
        ?>
        </a>
        
    </li>
    <li><a href="admins.php"><i class="glyphicon glyphicon-user"></i> Admins</a></li>
    <!-- <li><a href="users.php"><i class="glyphicon glyphicon-edit"></i> Users</a></li>
    <li><a href="contact-messages.php"><i class="glyphicon glyphicon-envelope"></i> Messages</a></li>-->
    <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
</ul>