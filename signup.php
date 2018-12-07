 <html>
<head>
<title>
 


</title>

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
<center><h3>Create your account</h3></center>
<form method="post"action="signup.php"enctype="multipart/form-date">
<p>name</p>
<input type="text"name="user_name"placeholder="user Name"pattern="[a-zA-Z' ']*$" title="Plz Enter Characters Only"  required>

<p>Email</p>
<input type="text"name="user_email"placeholder="email"pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Plz Enter valid email Address" required>

<p>Password</p>
<input type="password"name="user_password"placeholder="******" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

<p>Confirm_password:</p>
<input type="password"name="confirm_password"placeholder="******" required>

<p>State</p>
<select name="state_name">
<option   value="1">select your state</option>
<option value="Karnataka">Karnataka</option>
 <option value="Maharasthra">Maharasthra</option>
 <option value="=Tamil Nadu">Tamil Nadu</option>
 <option value="Jharkhand">Jharkhand</option>
 <option value="Andhara Pradesh">Andhara Pradesh</option>
 <option value="Punjab">Punjab</option>
 <option value="Manipur">Manipur</option>
 <option value="Assam">Assam</option>
 <option value="Delhi">Delhi</option>
  	 
 
	 
</select>
 
<p>City</p>
<select name="city_name">
 <option>select your city</option>
 <option value="Bangalore">Bangalore</option>
 <option value="Mumbai">Mumbai</option>
 <option value="Chennai">Chennai</option>
 <option value="Ranchi">Ranchi</option>
 <option value="Hyderabad">Hyderabad</option>
 <option value="Chandigarh">Chandigarh</option>
 <option value="Imphal">Imphal</option>
 <option value="Dispur">Dispur</option>
 <option value="New Delhi">Delhi</option>
  
 
	 
	

</select>
<p>Address</p>
<input type="text" placeholder="address" name="address"  required>

<p>Pincode</p>
<input type="text"placeholder="pincode"name="pin_code"pattern="[2-9]{6}" required>
<p>Phone</p>
<input type="text"placeholder="number"name="user_number">
<input type="submit"name="cancel"value="cancel">
<input type="submit"name="sign_up"value="sign up">
</form>
</div>
</div>




</body>
</html>

<?php include("includs/establish.php");
 
if(isset($_POST['sign_up'])){
	$user_name=$_POST['user_name'];
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];
	$confirm_password=$_POST['confirm_password'];
	$user_state=$_POST['state_name'];
	$user_city=$_POST['city_name'];
	$address=$_POST['address'];
	$user_pin=$_POST['pin_code'];
	$user_number=$_POST['user_number'];
	 
	
	if ($user_name=="" or $user_email=="" or $user_password=="" or $confirm_password=="" or $user_state=="" or $user_city=="" or $address==b"" or $user_pin=="" or $user_number==""){
	echo"<script>alert('please fill all the fields')</script>";
	exit();
	}
 elseif($user_password==$confirm_password)
	 {
		 $query_q = "SELECT * FROM  user_table WHERE user_email='$user_email' OR user_phone=$user_number";
				$run_q = mysqli_query($db,$query_q);
				if(mysqli_num_rows($run_q)>0)
				{
					echo '<script>alert("email or mobile number already exist")</script>';
				}
				else{
$query="insert into user_table( user_name,user_email,user_password,state_title,city_title,address,user_pin,user_phone)
values('$user_name','$user_email','$user_password','$user_state','$user_city','$address','$user_pin','$user_number')";
$run = mysqli_query($db,$query);
				
				if($run)
				{
					echo "<script>alert('you are successfully registered')</script>";
					echo"<script>window.open('user_login.php','_self')</script>";
					
				}
				else{
					echo "<script>alert('something went wrong')</script>";
					 
			
				}
				}
			
	 }
			else{
				echo '<script>alert("confirm password did not match")</script>';
			}
				}

	
 
	?>