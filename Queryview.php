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
								<li id="m1"><a href="studenthome.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="#">&nbsp;UPDATE PROFILE&nbsp;</a>
									<ul>
										<li id="m11"><a href="#">YEAR</a></li>
										<li id="m12"><a href="#">PASSWORD</a></li>
										<li id="m13"><a href="#">ROLL NO</a></li>
										<li id="m14"><a href="#">PHONE NO</a></li>
										<li id="m15"><a href="#">SEMESTER</li>
									</ul>
								</li>
								<li><a href="#">VIEW</a>
									<ul>
										<li id="m21"><a href="#">NOTICE</a></li>
										<li id="m22"><a href="#">RESULT</a></li>
										<li id="m23"><a href="#">QUERY</a></li>
									</ul>
								</li>
									<li id="m3"><a href="Query.php">QUERY</a></li>
									<li id="m4"><a href="#">ELECTIVE CHOICE</li>
									<li id="m5"><a href="Studentlogin.php">LOGOUT</a></li>
									</ul>
								</li>
										
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="login">
		<?php
		require('db.php');
		$q="SELECT * FROM query order by Query_id desc";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
			if($row['Query_reply']!='')
			{
				echo "<li>Posted by: ".$row['Author'];
				echo ":<br>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;".$row['Query_cont']."<br>Reply: ";
				echo $row['Query_reply']."<br>";
			}
		}
	      ?>	
	</div>	
</body>
</html>
