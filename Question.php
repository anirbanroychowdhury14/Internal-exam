<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="header">
		<div class="header-content">
			<table class="header-table">
				<tr>
					<td class="logo-img">
						<div class="trigger"><img src="Image/logo1.png"></div>
					</td>
					<td class="logo-text">
						<table style="position: relative;">
							<tr>
								<td>
									<div class="logo-txt-acr">
										St.Thomas' College of Engineering & Technology
								</td>
							</tr>
							<tr>
								<td>
									<div class="logo-txt-acr">
										<div class="logo-txt-nba"><span><b>Internal Exam Portal</b></span>
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
								<li id="m1"><a href="Teacherhome.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="#">&nbsp;UPDATE PROFILE&nbsp;</a>
									<ul>
										<li id="m12"><a href="updatetpassword.php">PASSWORD</a></li>
										<li id="m14"><a href="updatetphone.php">PHONE NO</a></li>
									</ul>
								</li>
								<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIEW&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									<ul>
										<li id="m21"><a href="#">TAGGED SUBJECT</a></li>
										<li id="m22"><a href="#">NOTICE</a></li>
									</ul>
								</li>
								<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UPLOAD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									<ul>
										<li id="m21"><a href="Question.php">QUESTION PAPER</a></li>
										<li id="m22"><a href="#">MARKS</a></li>
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
	<div class="login">
		<h2 id="h2" align="center">QUESTION PAPER UPLOAD</h2><hr>
		<form action="Question.php" enctype="multipart/form-data" method="post">
			<?php
				require('db.php');
				session_start();
				$username=$_SESSION['username'];
				echo "SUBJECT";
				echo "<Select name=\"subject\">
				<option value=\"none\" selected disabled hidden> SUBJECT</option>";
				$q="Select * from teacher_tag where username='$username' and Question=''";
				$result=mysqli_query($connection,$q);
				while ($row=mysqli_fetch_assoc($result)) {
					$sub=$row['Subject_name'];
					echo "<option value=\"$sub\">{$sub}</option>";
				}
				echo "<input type=\"file\" name=\"question\" accept=\".pdf\">*Upload pdf files only<br>";
			?>
			<button name="set">SET</button>
		</form>
	</div>	
</body>
</html>
<?php
	if(isset($_POST['set']))
	{
		header("Refresh:0");
		$sub=$_POST['subject'];
		$qn=$_FILES['question']['name'];
		$qt=$_FILES['question']['tmp_name'];
		$fstore="Uploads/".$qn;
		move_uploaded_file($qt, $fstore );
		$q="Update teacher_tag set Question='$qn' where Subject_name='$sub'";
		mysqli_query($connection,$q);
		echo "<script>alert('Question Uploaded')</script>";
	}
?>
