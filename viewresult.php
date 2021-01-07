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
		<h2 id="h2" align="center">VIEW RESULT</h2><hr>
		<form action="viewresult.php" method="post">
			<select name="exam" required="yes">
				<option value="" selected disabled hidden>EXAM</option>
				<option value="CA1">CA-1</option>
				<option value="CA2">CA-2</option>
				<option value="CA3">CA-3</option>
				<option value="CA4">CA-4</option>
				<option value="I1">Internal-1</option>
				<option value="I2">Internal-2</option>
			</select>
			<button name="check">CHECK</button>
		</form>
	</div>
	</body>
</html>
<?php
	session_start();
	if(!isset($_SESSION['username']))
      		header("Location: Studentlogin.php"); 
	require('db.php');
	if(isset($_POST['check']))
	{
		$exam=$_POST['exam'];
		$username=$_SESSION['username'];
		$q="Select * from student where username='$username'";
		$result=mysqli_query($connection,$q);
		while($row=mysqli_fetch_assoc($result))
		{
			$roll=$row['rollno'];
			$year=$row['year'];
			$dept=$row['dept'];
		}
		if($year=="1st" AND $dept=="CSE")
		{
			$dy=11;
		}
		elseif ($year=="2nd" AND $dept=="CSE") {
			$dy=12;
		}
		elseif ($year=="3rd" AND $dept=="CSE") {
			$dy=13;
		}
		elseif ($year=="4th" AND $dept=="CSE") {
			$dy=14;
		}
		elseif ($year=="1st" AND $dept=="EC") {
			$dy=21;
		}
		elseif ($year=="2nd" AND $dept=="EC") {
			$dy=22;
		}elseif ($year=="3rd" AND $dept=="EC") {
			$dy=23;
		}
		elseif ($year=="4th" AND $dept=="EC") {
			$dy=24;
		}
		elseif ($year=="1st" AND $dept=="EE") {
			$dy=31;
		}
		elseif ($year=="2nd" AND $dept=="EE") {
			$dy=32;
		}
		elseif ($year=="3rd" AND $dept=="EE") {
			$dy=33;
		}
		elseif ($year=="4th" AND $dept=="EE") {
			$dy=34;
		}
		elseif ($year=="1st" AND $dept=="IT") {
			$dy=41;
		}
		elseif ($year=="2nd" AND $dept=="IT") {
			$dy=42;
		}
		elseif ($year=="3rd" AND $dept=="IT") {
			$dy=43;
		}
		elseif ($year=="4th" AND $dept=="IT") {
			$dy=44;
		}
		echo "<div class=\"login\">
				<h2 align=\"center\">$exam</h2><hr>
				<table>";
		$total=0;
		$q="Select * from smarks where Roll=$roll and DY=$dy and Exam='$exam'";
		$result=mysqli_query($connection,$q);
		$rows=mysqli_num_rows($result);
		if ($rows==0) {
			echo "Result not pubished";
		}
		else
		{
			while ($row=mysqli_fetch_assoc($result)) 
			{
				$res=$row['Result'];
				if($res=='PUBLISHED')	
				{

					echo"<tr><td>". $row['Subject']."</td><td>".$row['Marks']."</td></tr>";
					$total=$total+$row['Marks'];
				}
				else
				{
					echo "Result not published";
				}
			}
			if ($res=="PUBLISHED") {
				echo "<tr><td>Total</td>"."<td>".$total."</td></tr></table>";
			}
		}
	}
?>