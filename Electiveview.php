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
								<li id="m1"><a href="Adminhome.html" id="home-button"><i class="fas fa-home"></i></a><</li>
								<li><a href="#">&nbsp;ROOM SETTING&nbsp;</a>
									<ul>
										<li id="m11"><a href="Roomsetting.php">ROOM SET</a></li>
										<li id="m12"><a href="Roomselect.php">VIEW ROOM</a></li>
									</ul>
								</li>
								<li><a href="Room_roll.php">VIEW ROLL DETAILS</a></li>
								<li id="m3"><a href="Attendance.php">ATTENDANCE SHEET</a></li>	
								<li id="m4"><a href="AdminLogin.php">LOGOUT</a></li>	
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>	
	<div class="login">
		<h2 id ="h2" align="center">ROLL SELECT</h2>
		<hr>
		<form action="" method="POST">
			<table>
				<tr>
					<td>DEPARTMENT <select name="dept" required="yes">
									<option value="none" selected disabled hidden> DEPARTMENT</option>
									<option value="CSE">Computer Science & Engineering</option>
									<option value="IT">Information Technology</option>
									<option value="EC">Electronics & Communications Engineering</option>
									<option value="EE">Electrical Engineering</option>
					</select></td>
					<td>SEMESTER <select name="sem">
									<option value="none" selected disabled hidden> SEM</option>
									<option value="1">SEM 1</option>
									<option value="2">SEM 2</option>
									<option value="3">SEM 3</option>
									<option value="4">SEM 4</option>
									<option value="5">SEM 5</option>
									<option value="6">SEM 6</option>
									<option value="7">SEM 7</option>
									<option value="8">SEM 8</option>
						</select></td>
				</tr>
			</table>
			<button name="select">SELECT</button>
		</form>
	</div>
</body>
</html>
<?php
	session_start();
	if(isset($_POST['select']))
	{
		$dept=$_POST['dept'];
		$sem=$_POST['sem'];
		$_SESSION['dept']=$dept;
		$_SESSION['sem']=$sem;
		header("Location:Elective.php");
	}
?>