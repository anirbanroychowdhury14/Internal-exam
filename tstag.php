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
		<h2 align="center">TEACHER STUDENT TAG</h2><hr>
		<form action="tstag.php" method="post">
		<?php
			require('db.php');
			session_start(); 
			if(!isset($_SESSION['login']))
			header("Location: Adminlogin.php");
			$q="Select * from teacher_tag where DY=0";
			$result=mysqli_query($connection,$q);
			$r=mysqli_num_rows($result);
			if($r>0){
			echo "<table border=\"1\" style=\"border-collapse:collapse;\">";
			echo "<tr>
						<th>Teacher User Name</th>
						<th>Subject Name</th>
						<th>Will teach</th>
				 </tr>";
			while ($row=mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['Subject_name']."</td>";
				echo "<td><select name=\"dy[]\" required=\"yes\">
					<option value=\"\" selected disabled hidden>Department Year</option>
					<option value=\"11\">CSE 1st year</option>
					<option value=\"12\">CSE 2nd year</option>
					<option value=\"13\">CSE 3rd year</option>
					<option value=\"14\">CSE 4th year</option>
					<option value=\"21\">EC 1st year</option>
					<option value=\"22\">EC  2nd year</option>
					<option value=\"23\">EC  3rd year</option>
					<option value=\"24\">EC  4th year</option>
					<option value=\"31\">EE  1st year</option>
					<option value=\"32\">EE  2nd year</option>
					<option value=\"33\">EE  3rd year</option>
					<option value=\"34\">EE  4th year</option>
					<option value=\"41\">IT  1st year</option>
					<option value=\"42\">IT  2nd year</option>
					<option value=\"43\">IT  3rd year</option>
					<option value=\"44\">IT  4th year</option></td>
					</select>
					";
				echo "</tr>";
			}
			echo "</table>";
			echo"<br><button name=\"set\">SUBMIT</button>";
		 }
		?>
	</form>
	</div>
	<div class="login">
		<h2 align="center">SUBJECT DETAILS</h2><hr>
		<?php
			$q="Select * from subject";
			$result=mysqli_query($connection,$q);
			echo "<table border=\"1\" style=\"border-collapse:collapse;\">";
			echo "<tr>
						<th>Subject Code</th>
						<th>Subject Name</th>
						<th>Department</th>
						<th>Semester</th>
				 </tr>";
			while ($row=mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row['Subject_code']."</td>";
				echo "<td>".$row['Subject_name']."</td>";
				echo "<td>".$row['DEPT']."</td>";
				echo "<td>".$row['Semester']."</td>";
				echo "</tr>";
			}
			echo "</table>";
			?>
	</div>
</body>
</html>
<?php
	if(isset($_POST['set']))
	{
		header("Refresh:0");
		$c=$_POST['dy'];
		$N = count($_POST['dy']);
		$q="Select * from teacher_tag";
		$result=mysqli_query($connection,$q);
		$i=0;
		while ($row=mysqli_fetch_assoc($result)) {
			$sub=$row['Subject_name'];
	        /*for($i=0; $i < $N; $i++)
	        {*/
	        	$var1=$c[$i];
	            $q = "Update teacher_tag set DY = $var1 where Subject_name='$sub'";
	            mysqli_query($connection,$q);
	            $i++;
	        // }
	     }
	}
?>