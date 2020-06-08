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
		<h2 id="h2" align="center">MARKS UPLOAD</h2>
		<hr>
		<form action="MarksUpload.php" method="post">
			<select name="subject" required="yes">
				<option value="" selected disabled hidden>SUBJECT</option>
				<?php
					session_start();
					require('db.php');
					$username=$_SESSION['username'];
					$q="Select * from teacher_tag where username='$username'";
					$result=mysqli_query($connection,$q);
					while ($row=mysqli_fetch_assoc($result)) {
						$sub=$row['Subject_name'];
						echo "<option value=\"$sub\">{$sub}</option>";
					}
				?>
			</select>
			<select name="exam" required="yes">
				<option value="" selected disabled hidden>EXAM</option>
				<option value="CA1">CA-1</option>
				<option value="CA2">CA-2</option>
				<option value="CA3">CA-3</option>
				<option value="CA4">CA-4</option>
				<option value="I1">Internal-1</option>
				<option value="I2">Internal-2</option>
			</select>
			<button name="select">SELECT</button>
		</form>
	</div>	
</body>
</html>
<?php
	if(isset($_POST['select']))
	{
		$sub=$_POST['subject'];
		$exam=$_POST['exam'];
		$_SESSION['subject']=$sub;
		$_SESSION['exam']=$exam;
		header("Location:MarksUpload_1.php");
	}
?>
