<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('Image/bg3.jpeg'); background-repeat: no-repeat;background-size: cover;-webkit-background-size: cover;
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
										<li id="m21"><a href="Snotice.php">NOTICE</a></li>
										<li id="m22"><a href="viewresult.php">RESULT</a></li>
										<li id="m23"><a href="Queryview.php">Q&A</a></li>
									</ul>
								</li>
								<li id="m3"><a href="Query.php">QUERY</a></li>
									<li id="m4"><a href="Electivechoice.php">ELECTIVE CHOICE</a></li>
									<li id="m5"><a href="slogout.php">LOGOUT</a></li>
										
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="login1">
		<h2 id="h2" align="center">UPDATE PHONE NUMBER</h2>
		<hr>
		<form action="updatephone.php" method="post">
			PHONE NUMBER
			<input type="text" name="mob" pattern="[0-9]{10}" required="yes" placeholder="mobile number">
			<button name="update">UPDATE</button>
		</form>
	</div>
</body>
<?php
	require('db.php');
	session_start();
	if(!isset($_SESSION['username']))
      		header("Location: Studentlogin.php"); 
	$username=$_SESSION['username'];
	if(isset($_POST['update']))
	{
		$mob=$_POST['mob'];
		$mob = mysqli_real_escape_string($connection,$mob);
		$q="Update student set phone=$mob where username='$username'";
		mysqli_query($connection,$q);
		echo"<script>alert('Phone number updated successfully')</script>";
	}

?>