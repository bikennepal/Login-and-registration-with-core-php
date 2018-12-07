<?php 
session_start();
if(isset($_SESSION['customer'])){
	header('location: my-account.php');
}else{
?>


 <html>
<head>
 
<style>
 
body
{
	margin:0;
	padding:0;
	background-image:url(phtos/pic.jpg);
	background-size:cover;
	font-family:Tahoma, sans-serif;
}
 
.form_area
{
	
	 position:absolute;
	 left:35%;
	 top:5%;
	 transform:translate(-50% 50%);
	 width:400px;
	 height:auto;
	 box-sizing:border-box;
	 background:rgba(0,0,0,0.5);
	 padding:40px;
}
h3
{
	margin:0;
	color:white;
	padding:0 0 20px;
	font-weight:bold;
}

.form_area p
{
	margin:0;
	padding:0;
	font-weight:;
	color:#ffffff;
	
}
.form_area input,select
{
	width:100%;
	margin-bottom:10px;
}
.form_area input[type=text], .form_area input[type=password]
{
	border:none;
	border-bottom:1px solid #ffffff;
	background-color:transparent;
	outline:none;
	height:20px;
	display:16px;
	color:white;
}

::placeholder
{
	color:white;
}

.form_area select
{
	margin-top:20px;
	padding:10px 0;
}

.form_area input[type=submit]
{
	border:none;
	height:40px;
	outline:none;
	border-radius:20px;
	background:tomato;
	cursor:pointer;
	color:white;
}
 .form_area input [type=submit]:hover
 {
	background-color:cyan;
	color:white;
 }
.form_area a
{
	color:white;
	text-decoration:none;
	font-size:14px;
}

</style>
</head>
<body>
 
 <div class="form_area">
<center><h3>Login to your account</h3></center>
<form method="post"action="user_login.php"enctype="multipart/form-date">
 
<p>Email</p>
<input type="text"name="user_email"placeholder="email">
<p>pasword</p>
<input type="password"placeholder="password"name="user_password">
<input type="reset"name="cancel"value="cancel">
<input type="submit"name="login"value="Login">
<a href="signup.php">create account</a>


<?php include("includs/establish.php");

if(isset($_POST['login']))
{
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];
	if($user_email=="" or $user_password=="")
	{
		
		echo"<script>alert('please enter your email and phone number')</script>";
		exit();
	}
	$query="select * from user_table where user_email='$user_email' and user_password='$user_password'";
	$run=mysqli_query($db,$query);
	$r= mysqli_fetch_assoc($run);
	if(mysqli_num_rows($run)>0)
				{
					$_SESSION['customer'] = $user_email;
					$_SESSION['customerid'] = $r['user_id'];
						echo "<script>window.open('checkout_orders.php','_SELF')</script>";
				}
					else
					{
					echo '<script>alert("done")</script>';
					header('location: index.php','_SELF');
				}
				echo '<script>alert("wrong email and password ")</script>';
				}

?>

</form>
</div>
</body>
</html>

<?php } ?>







 