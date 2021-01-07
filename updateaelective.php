<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('Image/bg4.jpeg'); background-repeat: no-repeat;background-size: cover;-webkit-background-size: cover;
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
			<table>
				<tr>
					<td>
						<div class="menu-bar">
							<ul>
								<li id="m1"><a href="Adminhome.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UPDATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									<ul>
										<li><a href="updateapassword.php">PASSWORD</a></li>
										<li><a href="updateasem.php">SEMESTER</a></li>
										<li><a href="updateaexam.php">EXAM STATUS</a></li>
										<li><a href="updateaelective.php">ELECTIVE STATUS</a></li>
									</ul></li>
								<li><a href="#">&nbsp;PUBLISH NOTICE&nbsp;</a>
									<ul>
										<li id="m11"><a href="Generalnotice.php">GENERAL</a></li>
										<li id="m12"><a href="Teachernotice.php">TEACHER</a></li>
										<li id="m13"><a href="Studentnotice.php">STUDENT</a></li>
									</ul>
								</li>
								<li><a href="#">VIEW DETAILS</a>
									<ul>
										<li id="m21"><a href="Adminstudent.php">STUDENT</a></li>
										<li id="m22"><a href="Adminteacher.php">TEACHER</a></li>
									</ul>
									<li id="m3"><a href="Seating.php">SEATING ARRANGEMENT</a></li>	
									<li><a href="Electiveview.php">ELECTIVE VIEW</a></li>
									<li id="m4"><a href="alogout.php">LOGOUT</a></li>
								</li>	
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>	
	<div class="login1">
		<h2 align="center">UPDATE ELECTIVE STATUS</h2><hr>
		<form action="updateaelective.php" method="post">
			ACCEPT ELECTIVE CHOICES<br>
			<button name="accept">ACCEPT</button>
		</form>
	</div>
</body>
</html>
<?php
	require('db.php');
	session_start(); 
	if(!isset($_SESSION['login']))
	header("Location: Adminlogin.php");
	if (isset($_POST['accept'])) {
		$q="Update electivesub set FILL='YES'";
		mysqli_query($connection,$q);	
	}
?>