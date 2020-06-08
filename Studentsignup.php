<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('Image/bg1.jpg');background-position: center; background-repeat: no-repeat;background-size: cover;-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;">
	<div class="header">
		<div class="header-content">
			<table class="header-table">
				<tr>
					<td class="logo-img">
						<div class="trigger"><img src="Image/logo1.png?v=<?php echo time(); ?>"></div>
					</td>
					<td class="logo-text">
						<table style="position: relative;">
							<tr>
								<td>
									<div class="logo-txt-acr">
										<b>EXAMINATION MANAGEMENT SYSTEM</b>
									</div>
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
					<td>YEAR <select name="year" required="yes">
									<option value="" selected disabled hidden> YEAR</option>
									<option value="1st">1st</option>
									<option value="2nd">2nd</option>
									<option value="3rd">3rd</option>
									<option value="4th">4th</option>
					</select></td>
					<td>DEPARTMENT <select name="dept" required="yes">
									<option value="" selected disabled hidden>DEPT</option>
									<option value="CSE">Computer Science & Engineering</option>
									<option value="IT">Information Technology</option>
									<option value="EC">Electronics & Communications Engineering</option>
									<option value="EE">Electrical Engineering</option>
					</select></td>
					<td>ROLL NO</td>
					<td><input type="text" name="roll" pattern="[0-9]{1,2,3,4}" placeholder="roll no" required="yes"></td>
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
	<div class="login1">
		<h2 align="center">ROLL NO RULES</h2><hr>
		Write the code before the roll no.
		<table>
			<th>CODE</th>
			<th>DEPT YEAR</th>
			<tr>
				<td>11</td>
				<td>CSE 1st</td>
			</tr>
			<tr>
				<td>12</td>
				<td>CSE 2nd</td>
			</tr>
			<tr>
				<td>13</td>
				<td>CSE 3rd</td>
			</tr>
			<tr>
				<td>14</td>
				<td>CSE 4th</td>
			</tr>
			<tr>
				<td>21</td>
				<td>EE 1st</td>
			</tr>
			<tr>
				<td>22</td>
				<td>EE 2nd</td>
			</tr>
			<tr>
				<td>23</td>
				<td>EE 3rd</td>
			</tr>
			<tr>
				<td>24</td>
				<td>EE 4th</td>
			</tr>
			<tr>
				<td>31</td>
				<td>EC 1st</td>
			</tr>
			<tr>
				<td>32</td>
				<td>EC 2nd</td>
			</tr>
			<tr>
				<td>33</td>
				<td>EC 3rd</td>
			</tr>
			<tr>
				<td>34</td>
				<td>EC 4th</td>
			</tr>
			<tr>
				<td>41</td>
				<td>IT 1st</td>
			</tr>
			<tr>
				<td>42</td>
				<td>IT 2nd</td>
			</tr>
			<tr>
				<td>43</td>
				<td>IT 3rd</td>
			</tr>
			<tr>
				<td>44</td>
				<td>IT 4th</td>
			</tr>
		</table>
		<p style="color:red;">Eg:If roll is 3 and dept is CSE and year is 1st then enter 1103 in roll</p>
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
	{
		echo'<script>alert("password does not match")</script>';
		exit();
	}
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
					if($roll<=1100 OR $roll>=1199)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="2nd" AND $dept=="CSE") {
					if($roll<=1200 OR $roll>=1299)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="3rd" AND $dept=="CSE") {
					if($roll<=1300 OR $roll>=1399)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
					}
				elseif ($year=="4th" AND $dept=="CSE") {
					if($roll<=1400 OR $roll>=1499)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="1st" AND $dept=="EC") {
					if($roll<=2100 OR $roll>=2199)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="2nd" AND $dept=="EC") {
					if($roll<=2200 OR $roll>=2299)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="3rd" AND $dept=="EC") {
					if($roll<=2300 OR $roll>=2399)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="4th" AND $dept=="EC") {
					if($roll<=2400 OR $roll>=2499)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="1st" AND $dept=="EE") {
					if($roll<=3100 OR $roll>=3199)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="2nd" AND $dept=="EE") {
					if($roll<=3200 OR $roll>=3299)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="3rd" AND $dept=="EE") {
					if($roll<=3300 OR $roll>=3399)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="4th" AND $dept=="EE") {
					if($roll<=3400 OR $roll>=3499)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="1st" AND $dept=="IT") {
					if($roll<=4100 OR $roll>=4199)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="2nd" AND $dept=="IT") {
					if($roll<=4200 OR $roll>=4299)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="3rd" AND $dept=="IT") {
					if($roll<=4300 OR $roll>=4399)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
				}
				elseif ($year=="4th" AND $dept=="IT") {
					if($roll<=4400 OR $roll>=4499)
					{
						echo'<script>alert("Invalid roll")</script>';
						exit();
					}
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