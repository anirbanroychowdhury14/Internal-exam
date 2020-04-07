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
								<li id="m1"><a href="Home.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="#">&nbsp;LOGIN&nbsp;</a>
									<ul>
										<li id="m21"><a href="AdminLogin.php">ADMIN</a></li>
										<li id="m22"><a href="TeacherLogin.php">TEACHER</a></li>
										<li id="m23"><a href="StudentLogin.php">STUDENT</a></li>
									</ul>
								</li>
								<li><a href="#">&nbsp;SIGN&nbsp;UP</a>
									<ul>
										<li id="m31"><a href="Teachersignup.php">TEACHER</a></li>
										<li id="m32"><a href="Studentsignup.php">STUDENT</a></li>
									</ul>
									</ul>
								</li>		
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>	
	<div class="grid-tile" style="position:relative;left:-5mm;">

			<div class="grid-title" id="marquee-tile">

			GENERAL NOTICE<hr>

			</div>

			<div class="grid-content" id="marquee-content">

			<div class="marquee">	
			<ul style="line-height: 200%;position: relative;top: -0.3cm;">		
				 <?php 
				 	require ('db.php');

   					 $query = "SELECT Gnotice_cont,Gnotice_file FROM gnotice ORDER BY Gnotice_id DESC";
    				 $select_all_categories_query = mysqli_query($connection,$query);

    				while($row = mysqli_fetch_assoc($select_all_categories_query)) {
       					$Gnotice_cont = $row['Gnotice_cont'];
        				$Gnotice_file = $row['Gnotice_file'];
        				if($Gnotice_file=='')
        				echo "<li>{$Gnotice_cont}</li>";
        				else
        				echo "<li><a href='Uploads/{$Gnotice_file}'>{$Gnotice_cont}</a></li>";
    				}
    				?>
    			</ul>
			</div>

			</div>

	</div>
</body>
</html>