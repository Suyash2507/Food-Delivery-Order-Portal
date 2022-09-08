<?php
session_start();
$username="";
$email="";
$errors=array();
//connect to database
$db=mysqli_connect('localhost','root','root','foodsys');
//if register button is clicked
if(isset($_POST['register']))
{$username=mysqli_real_escape_string($db,$_POST['username']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$password=mysqli_real_escape_string($db,$_POST['password']);
$conpassword=mysqli_real_escape_string($db,$_POST['conpassword']);
//ensure that form fields are filled properly
if(empty($username))
{
	array_push($errors,"Username is required");
}  
if(empty($email))
{
	array_push($errors,"Email is required");
}  
if(empty($password))
{
	array_push($errors,"Password  is required");
}    
if($password!=$conpassword)
{
	array_push($errors,"The two passwords do not match");
}	
if(count($errors)==0)
{
	$password=md5($password);//encryption
	$sql="INSERT INTO users (username,email,password)VALUES('$username','$email','$password')";
	mysqli_query($db,$sql);
	$_SESSION['username']=$username;
	$_SESSION['success']="You are now logged in";
	header('location:index.php');//homepage
}
}
if(isset($_POST['login']))
{
	$username=mysqli_real_escape_string($db,$_POST['username']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
	if(empty($username))
	{array_push($errors,"Username is required");
	}
	if(empty($password))
	{array_push($errors,"Password is required");
	}
	if(count($errors)==0)
	{
		$password=md5($password);
		$query="SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result=mysqli_query($db,$query);
		if(mysqli_num_rows($result)==1)
		{
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			header('location:index.php');//homepage
		
		}
		else{
		array_push($errors,"Wrong username/password Combination");
		
		}
	}
}
//logout
if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['username']);
	header('location:login.php');
}
?>