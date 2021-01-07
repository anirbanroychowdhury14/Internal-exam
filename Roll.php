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
								<li id="m1"><a href="Adminhome.php" id="home-button"><i class="fas fa-home"></i></a></li>
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
	<div class="login">
		<h2 id ="h2" align="center">ROLL SELECT</h2>
		<hr>
		<form action="" method="POST">
			<table>
				<tr>
					<td>YEAR <select name="year" required="yes">
									<option value="" selected disabled hidden> YEAR</option> 
									<option value="1st">1st</option>
									<option value="2nd">2nd</option>
									<option value="3rd">3rd</option>
									<option value="4th">4th</option>
					</select></td>
					<td>DEPARTMENT <select name="dept" required="yes">
									<option value="" selected disabled hidden> DEPARTMENT</option>
									<option value="CSE">Computer Science & Engineering</option>
									<option value="IT">Information Technology</option>
									<option value="EC">Electronics & Communications Engineering</option>
									<option value="EE">Electrical Engineering</option>
					</select></td>
					<td>STARTING ROLL NO</td>
					<td><input type="text" name="sroll" pattern="[0-9]{4}" required="yes" placeholder="first roll"></td>
					<td>ENDING ROLL NO</td>
					<td> <input type="text" name="eroll" pattern="[0-9]{4}" required="yes" placeholder="Last roll"></td>
				</tr>
			</table>
			<button name="set">SET</button>
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
	session_start(); 
	if(!isset($_SESSION['login']))
	header("Location: Adminlogin.php");
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
			if($sroll<=1100 OR $eroll>=1199)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=11";
			mysqli_query($connection,$q);
		}
		elseif ($dyid==12) 
		{
			if($sroll<=1200 OR $eroll>=1299)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=12";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==13) 
		{
			if($sroll<=1300 OR $eroll>=1399)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=13";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==14) 
		{
			if($sroll<=1400 OR $eroll>=1499)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=14";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==21) 
		{
			if($sroll<=2100 OR $eroll>=2199)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=21";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==22) 
		{
			if($sroll<=2200 OR $eroll>=2299)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=22";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==23) 
		{
			if($sroll<=2300 OR $eroll>=2399)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=23";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==24) 
		{
			if($sroll<=2400 OR $eroll>=2499)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=24";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==31) 
		{
			if($sroll<=3100 OR $eroll>=3199)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=31";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==32) 
		{
			if($sroll<=3200 OR $eroll>=3299)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=32";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==33) 
		{
			if($sroll<=3300 OR $eroll>=3399)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=33";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==34) 
		{
			if($sroll<=3400 OR $eroll>=3499)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=34";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==41) 
		{
			if($sroll<=4100 OR $eroll>=4199)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=41";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==42) 
		{
			if($sroll<=4200 OR $eroll>=4299)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=42";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==43) 
		{
			if($sroll<=4300 OR $eroll>=4399)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=43";
			mysqli_query($connection,$q);	
		}
		elseif ($dyid==44) 
		{
			if($sroll<=4400 OR $eroll>=4499)
			{
				echo'<script>alert("Invalid roll")</script>';
				exit();
			}
			$q="Update dept_year_roll set Sroll=$sroll,Eroll=$eroll,Croll=$sroll where Dy_id=44";
			mysqli_query($connection,$q);	
		}
		echo "<script>alert('Roll set')</script>";
	}
	
?>