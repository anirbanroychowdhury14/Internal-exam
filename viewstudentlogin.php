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
	</div>
	<div class="login">
		<?php
			require('db.php');
			session_start(); 
			if(!isset($_SESSION['login']))
			header("Location: Adminlogin.php");
			$username='';
			$q="Select * from student where login='NO'";
			$result=mysqli_query($connection,$q);
			echo "<table border=\"1\" style=\"border-collapse:collapse;\">";
			echo "<tr>
					<th>Roll</th>
					<th>Name</th>
					<th>Year</th>
					<th>Dept</th>
					<th>Username</th>
					<th>Phone number</th>
					<th>Approve</th>
					<th>Decline</th>
				</tr>";
			while ($row=mysqli_fetch_assoc($result)) {
				$username=$row['username'];
				echo "<tr>";
				echo "<td>".$row['rollno']."</td>";
				echo "<td>".$row['fname']." ".$row['mname']." ".$row['lname']."</td>";
				echo "<td>".$row['year']."</td>";
				echo "<td>".$row['dept']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['phone']."</td>";
				echo "<td><a style=\"color:green\" href='viewstudentlogin.php?Approve={$username}'><i class=\"fas fa-check-circle\"></i></a></td>";
				echo "<td><a style=\"color:red\" href='viewstudentlogin.php?Decline={$username}'><i class=\"fas fa-times-circle\"></i></a></td>";
				echo "</tr>";
			}
		?>
	</div>
</body>
</html>
<?php 
	if(isset($_GET['Decline'])){
	    $query = "DELETE FROM student WHERE username = '$username' ";
	    $delete_query = mysqli_query($connection,$query);
	    //exit();
	    header("Location:viewstudentlogin.php");
	 }
	 if(isset($_GET['Approve'])){
		//header("Refresh:0");
	    $query = "Update  student set login='YES' WHERE username = '$username' ";
	    $delete_query = mysqli_query($connection,$query);
	    header("Location:viewstudentlogin.php");
	 }

 ?>

