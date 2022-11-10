<?php
$me=true;
$server="localhost";
$username="root";
$password="";
$database="login";
$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
    die("connection failure".mysqli_connect_error());
}

if(array_key_exists('login',$_POST)){
	$id=$_POST['id'];
	$password=$_POST['password'];
	
$sql="SELECT * FROM `admin_login` WHERE `id` LIKE '$id' AND `password` LIKE '$password'";

$result=mysqli_query($con,$sql);
$rows=mysqli_num_rows($result);
if($rows>0){
	session_start();
	$_SESSION['admin']=$id;
	header("Location:admin.php");
}
else{
	$me=false;
}


}












?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Admin-login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="valid.js/jquery-1.11.0.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
body {
	color: #fff;
	 background: gray; 
	font-family: 'Roboto', sans-serif;
}
.form-control {
	font-size: 15px;
}
.form-control, .form-control:focus, .input-group-text {
	border-color: #e1e1e1;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 400px;
	height: auto;
	margin: 0 auto;
	padding: 30px 0;		
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form h2 {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.signup-form hr {
	margin: 0 -30px 20px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form label {
	font-weight: normal;
	font-size: 15px;
}
.signup-form .form-control {
	min-height: 38px;
	box-shadow: none !important;
}	
.signup-form .input-group-addon {
	max-width: 42px;
	text-align: center;
}	
.signup-form .btn, .signup-form .btn:active {        
	font-size: 16px;
	font-weight: bold;
	background: #19aa8d !important;
	border: none;
	min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #179b81 !important;
}
.signup-form a {
	color: #fff;	
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #19aa8d;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}
.signup-form .fa {
	font-size: 21px;
}
.signup-form .fa-paper-plane {
	font-size: 18px;
}
.signup-form .fa-check {
	color: #fff;
	left: 17px;
	top: 18px;
	font-size: 7px;
	position: absolute;
}
</style>
</head>
<body>
<div class="signup-form">
    <form id="signup"  action="admin_login.php" method="post">
		<h2>Admin login</h2>
		<p>Fill your details to enter admin page</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>                    
				</div>
				<input type="text"  name="id" placeholder="Admin id" id="username" required="required">
				<small></small>
			</div>
        </div>
        
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>                    
				</div>
				<input type="password"  name="password" id="password" placeholder="Password" required="required">
				<small></small>
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>                    
				</div>
				<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required="required">
				<small></small>
			</div>
        </div>
        <div class="form-group" style="text-align:center;">
        <p  style="color:red;">
		<?php
		if($me==false){
			echo "Incorrect details";
		}
		?>
		</p>

			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
             
		</div>
		<div class="form-group">
           
            <button type="submit" id="submit" class="btn btn-primary btn-lg" name="login">Login</button>
        </div>
    </form>
   
	<div class="text-center">Are you a user?<a href="login2.php">Click here</a></div>
</div>

</body>
</html>
