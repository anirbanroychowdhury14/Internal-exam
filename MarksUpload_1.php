<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('Image/bg2.jpeg'); background-repeat: no-repeat;background-size: cover;-webkit-background-size: cover;
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
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<div class="menu-bar">
							<ul>
								<li id="m1"><a href="Teacherhome.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="#">&nbsp;UPDATE PROFILE&nbsp;</a>
									<ul>
										<li id="m12"><a href="updatetpassword.php">PASSWORD</a></li>
										<li id="m14"><a href="updatetphone.php">PHONE NO</a></li>
									</ul>
								</li>
								<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIEW&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									<ul>
										<li id="m21"><a href="Taggedsubject.php">TAGGED SUBJECT</a></li>
										<li id="m22"><a href="Tnotice.php">NOTICE</a></li>
									</ul>
								</li>
								<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UPLOAD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									<ul>
										<li id="m21"><a href="Question.php">QUESTION PAPER</a></li>
										<li id="m22"><a href="MarksUpload.php">MARKS</a></li>
									</ul>
								</li>
								<li><a href="tagsubject.php">TAG SUBJECT</a></li>
								<li id="m5"><a href="Studentlogin.php">LOGOUT</a></li>
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php
		session_start();
		require('db.php');
		$sub=$_SESSION['subject'];
		$exam=$_SESSION['exam'];
		echo "<div class='login'>
		<h2 align=\"center\">$sub</h2><hr>
		<form action=\"MarksUpload_1.php\" method=\"post\">";
		$q="Select * from teacher_tag where Subject_name='$sub'";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
				$dy=$row['DY'];
		}
		if($dy==11)
		{
			$dept="CSE";
			$year="1st";
		}
		elseif ($dy==12) {
			$dept="CSE";
			$year="2nd";
		}
		elseif ($dy==13) {
			$dept="CSE";
			$year="3rd";
		}
		elseif ($dy==14) {
			$dept="CSE";
			$year="4th";
		}
		elseif ($dy==21) {
			$dept="EC";
			$year="1st";
		}
		elseif ($dy==22) {
			$dept="EC";
			$year="2nd";
		}
		elseif ($dy==23) {
			$dept="EC";
			$year="3rd";
		}
		elseif ($dy==24) {
			$dept="EC";
			$year="4th";
		}
		elseif ($dy==31) {
			$dept="EE";
			$year="1st";
		}
		elseif ($dy==32) {
			$dept="EE";
			$year="2nd";
		}
		elseif ($dy==33) {
			$dept="EE";
			$year="3rd";
		}
		elseif ($dy==34) {
			$dept="EE";
			$year="4th";
		}
		elseif ($dy==41) {
			$dept="IT";
			$year="1st";
		}
		elseif ($dy==42) {
			$dept="IT";
			$year="2nd";
		}
		elseif ($dy==43) {
			$dept="IT";
			$year="3rd";
		}
		elseif ($dy==44) {
			$dept="IT";
			$year="4th";
		}
		echo "<table border=\"1\" style=\"border-collapse:collapse;\">";
		echo "<tr>
				<th>Roll</th>
				<th>Marks</th>
				<th>Full Marks</th>
			</tr>";
		$q="Select * from student where year='$year' and dept='$dept'";
		$result=mysqli_query($connection,$q);
		$fm=0;
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$row['rollno']."</td>";
			echo "<td><input type=\"text\" name=\"marks[]\"></td>";
			if($exam=="CA1"or$exam=="CA2"or$exam=="CA3"or$exam=="CA4")
			{
				$fm=25;
				echo "<td>".$fm."</td>";
			}
			elseif ($exam=="I1"or$exam=="I2") 
			{
				$fm=50;
				echo "<td>".$fm."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		echo "<br><button name=\"post\">POST</button>
		</form>
		</div>";
	?>
</body>
</html>
<?php  
	if(isset($_POST['post']))
	{
		$c=$_POST['marks'];	
		$q="Select * from student where year='$year' and dept='$dept'";
		$result=mysqli_query($connection,$q);
		$i=0;
		while ($row=mysqli_fetch_assoc($result)) {
			$roll=$row['rollno'];
			$var1=$c[$i];
			if ($var1>$fm) {
				echo "<script>alert('Invalid marks')</script>";
				exit();
			}
			$q="Insert into smarks(rollno,DY,Subject,Exam,Marks) values ($roll,$dy,'$sub','$exam',$var1)";
			mysqli_query($connection,$q);
			$i++;
		}
		echo "<script>alert('Successfull')</script>";
	}

?>