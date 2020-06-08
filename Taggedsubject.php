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
	<div class="login1">
		<h2 id="h2" align="center">TAGGED SUBJECT</h2>
		<hr>
		<?php
			require('db.php');
			session_start();
			$username=$_SESSION['username'];
			$q="Select * from teacher_tag where username='$username'";
			$result=mysqli_query($connection,$q);
			while($row=mysqli_fetch_assoc($result))
			{
				echo $row['Subject_name']."<br>";
			}
		?>
	</div>	
</body>
</html>
