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
					<td>YEAR <select name="year" required="yes">
									<option value="none" selected disabled hidden> YEAR</option> 
									<option value="1st">1st</option>
									<option value="2nd">2nd</option>
									<option value="3rd">3rd</option>
									<option value="4th">4th</option>
					</select></td>
					<td>DEPARTMENT <select name="dept" required="yes">
									<option value="none" selected disabled hidden> DEPARTMENT</option>
									<option value="CSE">Computer Science & Engineering</option>
									<option value="IT">Information Technology</option>
									<option value="EC">Electronics & Communications Engineering</option>
									<option value="EE">Electrical Engineering</option>
					</select></td>
					<td>STARTING ROLL NO</td>
					<td><input type="text" name="sroll" pattern="[0-9]{1,2}" required="yes" placeholder="first roll"></td>
					<td>ENDING ROLL NO</td>
					<td> <input type="text" name="eroll" pattern="[0-9]{1,2}" required="yes" placeholder="Last roll"></td>
				</tr>
			</table>
			<button name="set">SET</button>
		</form>
	</div>
</body>
</html>
<?php
	require('db.php');
	if(isset($_POST['set']))
	{
		$dept=$_POST['dept'];
		$year=$_POST['year'];
		$sroll=$_POST['sroll'];
		$eroll=$_POST['eroll'];
		$q="Select * from dept_year_roll where Year='$year' and Department='$dept'";
		$result=mysqli_query($connection,$q);
		while ($row = mysqli_fetch_assoc($result)) {
			$dyid=$row['Dy_id'];
		}
		if($dyid==11)
		{
			$sroll=1100+$sroll;
			$eroll=1100+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=11";
			mysqli_query($connection,$q);
		}
		elseif ($dyid==12) 
		{
			$sroll=1200+$sroll;
			$eroll=1200+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=12";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==13) 
		{
			$sroll=1300+$sroll;
			$eroll=1300+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=13";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==14) 
		{
			$sroll=1400+$sroll;
			$eroll=1400+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=14";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==21) 
		{
			$sroll=2100+$sroll;
			$eroll=2100+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=21";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==22) 
		{
			$sroll=2200+$sroll;
			$eroll=2200+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=22";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==23) 
		{
			$sroll=2300+$sroll;
			$eroll=2300+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=23";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==24) 
		{
			$sroll=2400+$sroll;
			$eroll=2400+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=24";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==31) 
		{
			$sroll=3100+$sroll;
			$eroll=3100+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=31";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==32) 
		{
			$sroll=3200+$sroll;
			$eroll=3200+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=32";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==33) 
		{
			$sroll=3300+$sroll;
			$eroll=3300+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=33";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==34) 
		{
			$sroll=3400+$sroll;
			$eroll=3400+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=34";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==41) 
		{
			$sroll=4100+$sroll;
			$eroll=4100+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=41";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==42) 
		{
			$sroll=4200+$sroll;
			$eroll=4200+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=42";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==43) 
		{
			$sroll=4300+$sroll;
			$eroll=4300+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=43";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==44) 
		{
			$sroll=4400+$sroll;
			$eroll=4400+$eroll;
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=44";
			mysqli_query($connection,$q);	
		}
		echo "<script>alert('Roll set')</script>";
	}
	
?>