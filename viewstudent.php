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
								<li><a href="AdminLogin.php">LOGOUT</a></li>
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="login">
		<h2 align="center">VIEW STUDENT DETAILS</h2><hr>
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
	require('db.php');
	if(isset($_POST['set']))
	{
		$year=$_POST['year'];
		$dept=$_POST['dept'];
		echo "<div class=\"login\">";
		$q="Select * from student where dept='$dept' AND year='$year'";
		$result=mysqli_query($connection,$q);
		echo "<table border=\"1\" style=\"border-collapse:collapse;\">";
		echo "<tr>
				<th>Roll</th>
				<th>Name</th>
				<th>Year</th>
				<th>Dept</th>
				<th>Username</th>
				<th>Phone number</th>
			</tr>";
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row['rollno']."</td>";
			echo "<td>".$row['fname']." ".$row['mname']." ".$row['lname']."</td>";
			echo "<td>".$row['year']."</td>";
			echo "<td>".$row['dept']."</td>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['phone']."</td>";
		}
	}	
?>	
