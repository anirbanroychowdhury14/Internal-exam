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
			</table>
			<table>
				<tr>
					<td>
						<div class="menu-bar">
							<ul>
								<li><a href="Adminteacher.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="Questionview.php">VIEW QUESTIONS</a></li>
								<li><a href="viewmarks.php">VIEW MARKS</a></li>
								<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIEW TEACHER DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									<ul><li><a href="tstag.php">TEACHER STUDENT TAGGING</a></li>
										<li><a href="viewteacher.php">TEACHER NAMES</a></li>
										<li><a href="viewteacherlogin.php">VIEW TEACHER AWAITING APPROVAL</a></li>
									</ul>
								</li>
								<li><a href="alogout.php">LOGOUT</a></li>
									</ul>
								</li>
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>	
	</div>
	<div class="login">
		<h2 align="center">TEACHER DETAILS</h2><hr>
		<?php
			require('db.php');
			session_start(); 
			if(!isset($_SESSION['login']))
			header("Location: Adminlogin.php");
			$username='';
			$q="Select * from teacher";
			$result=mysqli_query($connection,$q);
			echo "<table border=\"1\" style=\"border-collapse:collapse;\">";
			echo "<tr>
				<th>Name</th>
				<th>Dept</th>
				<th>Username</th>
				<th>Phone number</th>
				<th>Delete</th>
			</tr>";
			while ($row=mysqli_fetch_assoc($result)) {
			$username=$row['username'];
			echo "<tr>";
			echo "<td>".$row['fname']." ".$row['mname']." ".$row['lname']."</td>";
			echo "<td>".$row['dept']."</td>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['phone']."</td>";
			echo "<td><a style=\"color:black\" href='viewteacher.php?Delete={$username}'><i class=\"fas fa-trash-alt\"></i></a></td>";
		}
		?>
	</div>
</body>
</html>
<?php 
	if(isset($_GET['Delete'])){
	    $query = "DELETE FROM teacher WHERE username = '$username' ";
	    $delete_query = mysqli_query($connection,$query);
	    header("Location:viewteacher.php");
	 }
?>