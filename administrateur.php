<html>
<head>
<title>Note Manager</title>
<link rel="stylesheet" type="text/css" href="login.css">

</head>
<body>
<div class="bigcontaine">
<div class="containe">
<div class="anm">
<img src="http://winsft.online/logo/admin_logo.png"><br>
</div>
<form name="form_admin" method="post" action="administrateur.php">

<input type="text" name="userid" id="userid"  placeholder="Enter your ID" class="conta user" required original-title="user name">
<br>
<input type="password" name="passadmin" id="lock" placeholder="Your password" class="conta pass" required original-title="password"><br>

 <a href="http://winsft.online/administrateur/gestion.html"input type="submit" name="login" value="login"class="log">login</a><br>
<a href="forgotadmin.php" input type="submit" name="find" value="truth" class="find">forgot password?</a><br>
</form>
</div>
</div>
</body>
// <?php
// if(isset($_POST["login"])){
	// $username=$_POST["userid"];
	// $password=$_POST["passadmin"];
	
	// $username=stripcslashes($usename);
	// $password=stripcslashes($password);
	// $bdd=mysqli_connect("localhost","root","franjo","winsoft");
	// $requete="select identifiant,password from 'administrateur' where identifiant='$username' and password='$password'";
	// $result=mysqli_query($requete,$bdd);
	// $rows=mysqli_fetch_array($result);
	// if($rows=["identifiant"]==$username and $rows=["password"]==$password){
		// echo header(location:gestion.html);
		
	// }
	
// }

// ?>
</html>