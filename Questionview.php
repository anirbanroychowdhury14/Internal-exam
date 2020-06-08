<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('Image/bg6.jpeg'); background-repeat: no-repeat;background-size: cover;-webkit-background-size: cover;
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
								<li><a href="Adminteacher.html" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="Questionview.php">VIEW QUESTIONS</a></li>
								<li><a href="viewmarks.php">VIEW MARKS</a></li>
								<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIEW TEACHER DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									<ul><li><a href="tstag.php">TEACHER STUDENT TAGGING</a></li>
										<li><a href="viewteacher.php">TEACHER NAMES</a></li>
									</ul>
								</li>
								<li><a href="Adminlogin.php">LOGOUT</a></li>
									</ul>
								</li>
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>	
	</div><br><br><br><br>
	<div class="grid-tile" style="position:relative;left:-5mm;">

			<div class="grid-title" id="marquee-tile">

			QUESTION PAPER<hr>

			</div>

			<div class="grid-content" id="marquee-content">

			<div class="marquee">	
			<ul style="line-height: 200%;position: relative;top: -0.3cm;">		
				 <?php 
				 	require ('db.php');

   					 $query = "SELECT * FROM teacher_tag  where Question !=''";
    				 $select_all_categories_query = mysqli_query($connection,$query);

    				while($row = mysqli_fetch_assoc($select_all_categories_query)) {
       					$sub = $row['Subject_name'];
        				$Question = $row['Question'];
        				echo "<li><a href='Uploads/{$Question}'>{$sub}</a></li>";
    				}
    				?>
    			</ul>
			</div>

			</div>

	</div>
</body>
</html>
