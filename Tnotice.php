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
	</div><br><br><br><br>
	<div class="grid-tile" style="position:relative;left:-5mm;">

			<div class="grid-title" id="marquee-tile">

			TEACHER NOTICE<hr>

			</div>

			<div class="grid-content" id="marquee-content">

			<div class="marquee">	
			<ul style="line-height: 200%;position: relative;top: -0.3cm;">		
				 <?php 
				 	require ('db.php');

   					 $query = "SELECT * FROM tnotice ORDER BY Tnotice_id DESC";
    				 $select_all_categories_query = mysqli_query($connection,$query);

    				while($row = mysqli_fetch_assoc($select_all_categories_query)) {
       					$Tnotice_cont = $row['Tnotice_cont'];
        				$Tnotice_file = $row['Tnotice_file'];
        				if($Tnotice_file=='')
        				echo "<li>{$Tnotice_cont}</li>";
        				else
        				echo "<li><a href='Uploads/{$Tnotice_file}'>{$Tnotice_cont}</a></li>";
    				}
    				?>
    			</ul>
			</div>

			</div>

	</div>
</body>
</html>