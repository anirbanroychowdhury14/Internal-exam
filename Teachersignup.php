<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
	<script type="text/javascript" ></script>
</head>
<body>
	<div class="header">
		<div class="header-content">
			<table class="header-table">
				<tr>
					<td class="logo-img">
						<div class="trigger"><img src="Image/logo1.png"></div>
					</td>
					<td class="logo-text">
						<table style="position: relative;">
							<tr>
								<td>
									<div class="logo-txt-acr">
										St.Thomas' College of Engineering & Technology
								</td>
							</tr>
							<tr>
								<td>
									<div class="logo-txt-acr">
										<div class="logo-txt-nba"><span><b>Internal Exam Portal</b></span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<div class="menu-bar">
							<ul>
								<li id="m1"><a href="Home.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="#">&nbsp;LOGIN&nbsp;</a>
									<ul>
										<li id="m21"><a href="Adminlogin.php">ADMIN</a></li>
										<li id="m22"><a href="Teacherlogin.php">TEACHER</a></li>
										<li id="m23"><a href="Studentlogin.php">STUDENT</a></li>
									</ul>
								</li>
								<li><a href="#">&nbsp;SIGN&nbsp;UP</a>
									<ul>
										<li id="m31"><a href="#">TEACHER</a></li>
										<li id="m32"><a href="Studentsignup.php">STUDENT</a></li>
									</ul>
									</ul>
								</li>		
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="login">
		<h2 id ="h2" align="center">TEACHER SIGN UP</h2>
		<hr>
		<form action="Teachersignup.php" method="post">
			<table>
				<tr>
					<td>FIRST NAME
					<input type="text" name="fname" placeholder="First Name" required="yes"></td>
					<td>MIDDLE NAME
					<input type="text" name="mname" placeholder="Middle Name"></td>
					<td>LAST NAME
					<input type="text" name="lname" placeholder="Last Name" required="yes"></td>
				</tr>
				<tr>
					<td>DEPARTMENT <select name="dept">
									<option value="none" selected disabled hidden> DEPARTMENT</option>
									<option value="CSE">Computer Science & Engineering</option>
									<option value="IT">Information Technology</option>
									<option value="EC">Electronics & Communications Engineering</option>
									<option value="EE">Electrical Engineering</option>
									<option value="OT">Others</option>
					</select></td>
					<td>MOBILE NO
					<input type="text" name="mob" pattern="[0-9]{10}" required="yes" placeholder="Mobile no"></td>
					<td>EMAIL
					<input type="email" name="email" placeholder="Email" required="yes"></td>
				</tr>
				<tr>
					<td>PASSWORD
					<input type="password" name="password" placeholder="password" required="yes" minlength="6" maxlength="14"></td>
					<td>CONFIRM PASSWORD
					<input type="password" name="cpassword" placeholder="password" required="yes" minlength="6" maxlength="14"></td>
				</tr>
			</table>
			<button type="submit" name="submit">SIGN UP</button>
		</form>
	</div>
</body>
</html>
<?php
	require('db.php');
	$p='';
	$cp='';
	if (isset($_POST['password'])) {
	$p=$_POST['password'];
	$cp=$_POST['cpassword'];
}
	if($p!=$cp)
		echo'<script>alert("password does not match")</script>';
	if (isset($_POST['email']))
	{
		$username = $_POST['email'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mname = $_POST['mname'];
		$dept=$_POST['dept'];
		$mob=$_POST['mob'];
 		$username = mysqli_real_escape_string($connection,$username);
 		$fname = mysqli_real_escape_string($connection,$fname);
 		$lname = mysqli_real_escape_string($connection,$lname);
 		$mname = mysqli_real_escape_string($connection,$mname);
	}
	if (isset($_POST['submit'])) {
		$query="INSERT INTO teacher (username,fname,mname,lname,dept,phone,password)";
		$query .="VALUES('$username','$fname', '$mname','$lname','$dept',$mob,'$p')";
		$result=mysqli_query($connection,$query);
		if($result)
		echo "<script>alert('Successfull')</script>";
		else
		echo "<script>alert('Error')</script>";
	}
?>