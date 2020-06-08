
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
										<li id="m23"><a href="Queryview.php">QUERY</a></li>
									</ul>
								</li>
								<li id="m3"><a href="Query.php">QUERY</a></li>
									<li id="m4"><a href="Electivechoice.php">ELECTIVE CHOICE</a></li>
									<li id="m5"><a href="Studentlogin.php">LOGOUT</a></li>
										
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="login1">
		<h2 id="h2" align="center">ELECTIVE CHOICE</h2>
		<hr>
			<?php
				$e=0;
				require('db.php');
				session_start();
				$username=$_SESSION['username'];
				$q="Select * from student where username='$username'";
				$result=mysqli_query($connection,$q);
				while($row=mysqli_fetch_assoc($result))
				{
					$sem=$row['semester']+1;
					$dept=$row['dept'];
				}
				echo"<form action=\"Electivechoice.php\" method=\"post\">";
				$q="Select * from electivesub where Semester='$sem' and dept='$dept' and FILL='YES'";
				$result=mysqli_query($connection,$q);
				while($row=mysqli_fetch_assoc($result))
				{
					if($row['Elective_choice']>$e)
						$e=$row['Elective_choice'];
				}
				for ($i=1; $i <=$e ; $i++) { 
					echo"<h2 align=\"center\">Elective $i</h2><hr>";
					echo" <select name=\"subject$i\" required=\"yes\">
									<option value=\"\" selected disabled hidden> SUBJECT</option>";
									$q="Select * from electivesub where Semester='$sem' and dept='$dept' and Elective_choice=$i";
									$result=mysqli_query($connection,$q);
									while($row=mysqli_fetch_assoc($result))
									{
											$sub=$row['Subject_name'];
											echo "<option value=\"$sub\">{$sub}</option>";
									}
					echo "</select>";
				}
				if($e==0)
					echo "No elective subject";
				else
				{
					echo "<br><br>";
					echo "<button name=\"set\">SET</button>";
				}
				echo "</form>";
			?>
	</div>	
</body>
</html>
<?php
	if(isset($_POST['set']))
	{
		$q="Select * from student where username='$username'";
		$result=mysqli_query($connection,$q);
		while($row=mysqli_fetch_assoc($result))
		{
			$sem=$row['semester']+1;
			$dept=$row['dept'];
			$roll=$row['rollno'];
			$year=$row['year'];
		}
		if ($e==1) {
			$s1=$_POST['subject1'];
			$q="Insert into student_elective(username,rollno,Semester,Dept,Subject_1) values('$username',$roll,$sem,'$dept','$s1')";
			mysqli_query($connection,$q);
			echo"<script>alert('Elective Choice filled successfully')</script>";
		}
		elseif ($e==2) {
			$s1=$_POST['subject1'];
			$s2=$_POST['subject2'];
			$q="Insert into student_elective(username,rollno,Semester,Dept,Subject_1,Subject_2) values('$username',$roll,$sem,'$dept','$s1','$s2')";
			mysqli_query($connection,$q);
			echo"<script>alert('Elective Choice filled successfully')</script>";
		}
		elseif ($e==3) {
			$s1=$_POST['subject1'];
			$s2=$_POST['subject2'];
			$s3=$_POST['subject3'];
			$q="Insert into student_elective(username,rollno,Semester,Dept,Subject_1,Subject_2,Subject_3) values('$username',$roll,$sem,'$dept','$s1','$s2','$s3')";
			mysqli_query($connection,$q);
			echo"<script>alert('Elective Choice filled successfully')</script>";
		}
	}
?>