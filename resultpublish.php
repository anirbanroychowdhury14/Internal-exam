<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('Image/bg6.jpeg'); background-repeat: no-repeat;background-size: cover;-webkit-background-size: cover;
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
			<table>
				<tr>
					<td>
						<div class="menu-bar">
							<ul>
								<li><a href="Adminstudent.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="Adminquery.php">&nbsp;VIEW QUERY&nbsp;</a></li>
								<li><a href="resultpublish.php"s>PUBLISH RESULT</a></li>
								<li><a href="viewstudent.php">VIEW STUDENT DETAILS</a></li>
								<li><a href="viewstudentlogin.php">VIEW STUDENT AWAITING APPROVAL</a></li>
								<li><a href="alogout.php">LOGOUT</a></li>
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>	<div class="login">
		<h2 align="center">RESULT PUBLISH</h2><hr>
		<form action="resultpublish.php" method="post">
			<select name="result" required="yes">
					<option value="" selected disabled hidden>Department Year</option>
					<option value="11">CSE 1st year</option>
					<option value="12">CSE 2nd year</option>
					<option value="13">CSE 3rd year</option>
					<option value="14">CSE 4th year</option>
					<option value="21">EC  1st year</option>
					<option value="22">EC  2nd year</option>
					<option value="23">EC  3rd year</option>
					<option value="24">EC  4th year</option>
					<option value="31">EE  1st year</option>
					<option value="32">EE  2nd year</option>
					<option value="33">EE  3rd year</option>
					<option value="34">EE  4th year</option>
					<option value="41">IT  1st year</option>
					<option value="42">IT  2nd year</option>
					<option value="43">IT  3rd year</option>
					<option value="44">IT  4th year</option></td>
			</select>
			<button name="publish">PUBLISH</button>
		</form>
	</div>
</body>
</html>
<?php
	require('db.php');
	session_start(); 
	if(!isset($_SESSION['login']))
	header("Location: Adminlogin.php");
	if(isset($_POST['publish']))
	{
		$dy=$_POST['result'];
		$q="Update smarks set Result='PUBLISHED' where DY=$dy";
		mysqli_query($connection,$q);
		echo "<script>alert('Result Published')</script>";
	}
?>