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
				<h2 id="h2" align="center">UPDATE ROLL</h2>
				<hr>
				<form action="updateroll.php" method="post">
					ROLL NO
					<input type="text" name="roll" pattern="[0-9]{4}" placeholder="Roll" required="yes">
					<button type="submit" name="update">UPDATE</button>
				</form>
	</div>
</body>
<?php
	require('db.php');
	session_start();
	if(!isset($_SESSION['username']))
      		header("Location: Studentlogin.php"); 
	$username=$_SESSION['username'];
	$roll=0;
	if (isset($_POST['update'])) {
		$q="Select * from student where username='$username'";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
			$year=$row['year'];
			$dept=$row['dept'];
		}
		$roll=$_POST['roll'];
		$roll = mysqli_real_escape_string($connection,$roll);
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
		$q="Update student set rollno=$roll where username='$username'";
		mysqli_query($connection,$q);
		echo"<script>alert('Roll Updated successfully')</script>";
	}
?>