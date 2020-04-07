<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
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
								<li id="m1"><a href="studenthome.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="#">&nbsp;UPDATE PROFILE&nbsp;</a>
									<ul>
										<li id="m11"><a href="updateyear.php">YEAR</a></li>
										<li id="m12"><a href="updatepassword.php">PASSWORD</a></li>
										<li id="m13"><a href="updateroll.php">ROLL NO</a></li>
										<li id="m14"><a href="updatephone.php">PHONE NO</a></li>
										<li id="m15"><a href="updatesem.php">SEMESTER</a></li>
									</ul>
								</li>
								<li><a href="#">VIEW</a>
									<ul>
										<li id="m21"><a href="#">NOTICE</a></li>
										<li id="m22"><a href="#">RESULT</a></li>
										<li id="m23"><a href="Queryview.php">QUERY</a></li>
									</ul>
								</li>
								<li id="m3"><a href="Query.php">QUERY</a></li>
									<li id="m4"><a href="#">ELECTIVE CHOICE</a></li>
									<li id="m5"><a href="Studentlogin.php">LOGOUT</a></li>
										
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="login">
				<h2 id="h2" align="center">UPDATE ROLL</h2>
				<hr>
				<form action="updateroll.php" method="post">
					ROLL NO
					<input type="text" name="roll" pattern="[0-9]{1,2}" placeholder="Roll" required="yes">
					<button type="submit" name="update">UPDATE</button>
				</form>
	</div>
</body>
<?php
	require('db.php');
	session_start();
	$username=$_SESSION['username'];
	if (isset($_POST['update'])) {
		$q="Select * from student where username='$username'";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
			$year=$row['year'];
			$dept=$row['dept'];
		}
		$roll=$_POST['roll'];
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
		$q="Update student set rollno=$roll where username='$username'";
		mysqli_query($connection,$q);
		echo"<script>alert('Roll Updated successfully')</script>";
	}
?>