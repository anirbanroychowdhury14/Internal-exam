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
								<li><a href="#">&nbsp;PUBLISH NOTICE&nbsp;</a>
									<ul>
										<li id="m11"><a href="Generalnotice.php">GENERAL</a></li>
										<li id="m12"><a href="#">TEACHER</a></li>
										<li id="m13"><a href="#">STUDENT</a></li>
									</ul>
								</li>
								<li><a href="#">VIEW DETAILS</a>
									<ul>
										<li id="m21"><a href="#">STUDENT</a></li>
										<li id="m22"><a href="#">TEACHER</a></li>
									</ul>
									<li id="m3"><a href="AdminLogin.php">LOGOUT</a></li>
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
		<form action="Teachernotice.php" enctype="multipart/form-data" method="POST">
		<textarea cols=50 rows=5 required="yes" name ="tnotice"></textarea><br>
		<input type="file" name="notice" accept=".pdf">*Upload pdf files only<br>
		<button type="submit" name="post" class="post">POST</button>
		</form>
	</div>
</body>
</html> 
<?php
	require('db.php');
	$tnoticen='';
	$tnoticent='';
	$tnotice='';
	$query='';
	$fstore='';
	if(isset($_POST['tnotice']))
	$tnotice = $_POST['tnotice'];
	if(isset($_FILES['notice']))
	{
		$tnoticen=$_FILES['notice']['name'];
		$tnoticent=$_FILES['notice']['tmp_name'];
		$fstore="Uploads/".$tnoticen;
		move_uploaded_file($tnoticent, $fstore );
	}
	$tnotice = mysqli_real_escape_string($connection, $tnotice );
    $tnoticen = mysqli_real_escape_string($connection, $tnoticen );
   	$tnoticent = mysqli_real_escape_string($connection, $tnoticent );
	if (isset($_POST['post'])) {
        $query = "INSERT INTO tnotice(Tnotice_cont,Tnotice_file) ";
    	$query .= "VALUES ('$tnotice','$tnoticen')";
    	$result = mysqli_query($connection, $query);
    	echo "<script>alert('Notice published')</script>";	 
   	} 	
  ?>