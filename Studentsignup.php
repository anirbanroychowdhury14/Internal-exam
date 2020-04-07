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
										<li id="m31"><a href="Teachersignup.php">TEACHER</a></li>
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
		<h2 id ="h2" align="center">STUDENT SIGN UP</h2>
		<hr>
		<form action="Studentsignup.php" method="post">
			<table>
				<tr>
					<td>FIRST NAME</td>
					<td><input type="text" name="fname" placeholder="First Name" required="yes"></td>
					<td>MIDDLE NAME</td>
					<td><input type="text" name="mname" placeholder="Middle Name"></td>
					<td>LAST NAME</td>
					<td><input type="text" name="lname" placeholder="Last Name" required="yes"></td>
				</tr>
				<tr>
					<td>YEAR <select name="year">
									<option value="none" selected disabled hidden> YEAR</option>
									<option value="1st">1st</option>
									<option value="2nd">2nd</option>
									<option value="3rd">3rd</option>
									<option value="4th">4th</option>
					</select></td>
					<td>DEPARTMENT <select name="dept">
									<option value="none" selected disabled hidden> YEAR</option>
									<option value="CSE">Computer Science & Engineering</option>
									<option value="IT">Information Technology</option>
									<option value="EC">Electronics & Communications Engineering</option>
									<option value="EE">Electrical Engineering</option>
					</select></td>
					<td>ROLL NO</td>
					<td><input type="text" name="roll" pattern="[0-9]{1,2}" required="yes"></td>
					<td>MOBILE NO</td>
					<td> <input type="text" name="mob" pattern="[0-9]{10}" required="yes" placeholder="Mobile no"></td>
				</tr>
				<tr>
					<td>EMAIL</td>
					<td><input type="email" name="email" placeholder="Email" required="yes"></td>
					<td>PASSWORD</td>
					<td><input type="password" name="password" placeholder="password" required="yes" minlength="6" maxlength="14"></td>
					<td>CONFIRM PASSWORD</td>
					<td><input type="password" name="cpassword" placeholder="password" required="yes" minlength="6" maxlength="14"></td>
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
		$year = $_POST['year'];
		$dept=$_POST['dept'];
		$roll=$_POST['roll'];
		$mob=$_POST['mob'];
 		$username = mysqli_real_escape_string($connection,$username);
 		$fname = mysqli_real_escape_string($connection,$fname);
 		$lname = mysqli_real_escape_string($connection,$lname);
 		$mname = mysqli_real_escape_string($connection,$mname);
	}
	if (isset($_POST['submit'])) {
				if($year=="1st" AND $dept=="CSE")
				{
					$roll=$roll+1100;
				}
				elseif ($year=="2nd" AND $dept=="CSE") {
					$roll=$roll+1200;
				}
				elseif ($year=="3rd" AND $dept=="CSE") {
					$roll=$roll+1300;
				}
				elseif ($year=="4th" AND $dept=="CSE") {
					$roll=$roll+1400;
				}
				elseif ($year=="1st" AND $dept=="EC") {
					$roll=$roll+2100;
				}
				elseif ($year=="2nd" AND $dept=="EC") {
					$roll=$roll+2200;
				}elseif ($year=="3rd" AND $dept=="EC") {
					$roll=$roll+2300;
				}
				elseif ($year=="4th" AND $dept=="EC") {
					$roll=$roll+2400;
				}
				elseif ($year=="1st" AND $dept=="EE") {
					$roll=$roll+3100;
				}
				elseif ($year=="2nd" AND $dept=="EE") {
					$roll=$roll+3200;
				}
				elseif ($year=="3rd" AND $dept=="EE") {
					$roll=$roll+3300;
				}
				elseif ($year=="4th" AND $dept=="EE") {
					$roll=$roll+3400;
				}
				elseif ($year=="1st" AND $dept=="IT") {
					$roll=$roll+4100;
				}
				elseif ($year=="2nd" AND $dept=="IT") {
					$roll=$roll+4200;
				}
				elseif ($year=="3rd" AND $dept=="IT") {
					$roll=$roll+4300;
				}
				elseif ($year=="4th" AND $dept=="IT") {
					$roll=$roll+4400;
				}
		$query="INSERT INTO student (username,fname,mname,lname,year,dept,phone,password,rollno)";
		$query .="VALUES('$username','$fname', '$mname','$lname','$year','$dept',$mob,'$p',$roll)";
		$result=mysqli_query($connection,$query);
		if($result)
		echo "<script>alert('Successfull')</script>";
		else
			echo "Error";
	}

	?>