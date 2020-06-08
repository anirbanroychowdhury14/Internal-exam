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
								<li id="m1"><a href="Adminhome.html" id="home-button"><i class="fas fa-home"></i></a></li>
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
		<h2 id ="h2" align="center">ROOM SELECT</h2>
		<hr>
		<form action="" method="POST">
			ROOM NO
			<input type="text" name="roomno" required="yes">
			NO OF COLUMNS
			<input type="text" name="column" required="yes"><br>
			<button name="select">SELECT</button>
		</form>
	</div>
</body>
</html>
<?php
	require('db.php');
	session_start();
	if(isset($_POST['select']))
	{
		$room=$_POST['roomno'];
		$col=$_POST['column'];
		$rm="Room".$room;
		$query="INSERT INTO room (Room_no,Col_count)VALUES($room,$col)";
		mysqli_query($connection,$query);
		$_SESSION['room']=$room;
		$_SESSION['col']=$col;
		if($col==2)
		{
			mysqli_select_db ( $connection ,  'iems' );
			$q="CREATE TABLE `$rm` ( `Room_no` INT NOT NULL , `Col_count` INT NOT NULL , `col1` BIGINT NOT NULL , `col2` BIGINT NOT NULL )";
			mysqli_query($connection,$q);
			$r1=rand(1,9999);
			$r2=rand(1,9999);
			$q="Insert into $rm values($room,$col,$r1,$r2)";
			mysqli_query($connection,$q);
			header("Location:Rooms.php");
		}
		elseif ($col==3) 
		{
			mysqli_select_db ( $connection ,  'iems' );
			$q="CREATE TABLE `$rm` ( `Room_no` INT NOT NULL , `Col_count` INT NOT NULL , `col1` BIGINT NOT NULL , `col2` BIGINT NOT NULL ,`col3` BIGINT NOT NULL )";
			mysqli_query($connection,$q);
			$r1=rand(1,9999);
			$r2=rand(1,9999);
			$r3=rand(1,9999);
			$q="Insert into $rm values($room,$col,$r1,$r2,$r3)";
			mysqli_query($connection,$q);
			header("Location:Rooms.php");
		}
	}
?>