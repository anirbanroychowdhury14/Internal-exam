<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('Image/bg5.jpeg'); background-repeat: no-repeat;background-size: cover;-webkit-background-size: cover;
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
								<li id="m1"><a href="Adminhome.html" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="#">&nbsp;ROOM SETTING&nbsp;</a>
									<ul>
										<li id="m11"><a href="Roomsetting.php">ROOM SET</a></li>
										<li id="m12"><a href="Roomselect.php">VIEW ROOM</a></li>
									</ul>
								<li><a href="Room_roll.php">VIEW ROLL DETAILS</a></li>
								<li><a href="Roll.php">SET ROLL DETAILS</a></li>
								<li id="m3"><a href="Attendance.php">ATTENDANCE SHEET</a></li>	
								<li id="m4"><a href="AdminLogin.php">LOGOUT</a></li>
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>	
	</div>
	<div class="login"><h2 align="center">ATTENDANCE SHEET</h2><hr>
		<form action="" method="post">
					YEAR <select name="year" required="yes">
									<option value="" selected disabled hidden> YEAR</option> 
									<option value="1st">1st</option>
									<option value="2nd">2nd</option>
									<option value="3rd">3rd</option>
									<option value="4th">4th</option>
					</select>
					DEPARTMENT <select name="dept" required="yes">
									<option value="" selected disabled hidden> DEPARTMENT</option>
									<option value="CSE">Computer Science & Engineering</option>
									<option value="IT">Information Technology</option>
									<option value="EC">Electronics & Communications Engineering</option>
									<option value="EE">Electrical Engineering</option>
					</select>
			<button name="set">SET</button>
		</form>
	</div>
</body>
</html>
<?php
	session_start();
	if(isset($_POST['set']))
	{
		$_SESSION['dept']=$_POST['dept'];
		$_SESSION['year']=$_POST['year'];
		header("Location:Attendancesheet.php");
	}
?>