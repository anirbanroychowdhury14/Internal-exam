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
			<table>
			<table>
				<tr>
					<td>
						<div class="menu-bar">
							<ul>
								<li><a href="Adminstudent.php" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="Adminquery.php">&nbsp;VIEW QUERY&nbsp;</a></li>
								<li><a href="resultpublish.php"s>PUBLISH RESULT</a></li>
								<li><a href="viewstudent.php">VIEW STUDENT DETAILS</a></li>
								<li><a href="viewstudentlogin.php">VIEW STUDENT AWAITING APPROVAL</a></li>
								<li><a href="alogout.php">LOGOUT</a></li>
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>	
	</div>	<div class="login">
		<h2 align="center">Queries</h2>
		<hr>
		<?php 
				 	require ('db.php');
				 	session_start(); 
					if(!isset($_SESSION['login']))
					header("Location: Adminlogin.php");
   					 $query = "SELECT * FROM query where Query_reply =''limit 1";
    				 $result = mysqli_query($connection,$query);
    				while($row = mysqli_fetch_assoc($result)) {
    					$id=$row['Query_id'];
       					$Query_cont = $row['Query_cont'];
       					$author=$row['Author'];
   						echo"<li>Posted by: ".$author."</li>";
        				echo "&nbsp&nbsp&nbsp&nbsp&nbsp{$Query_cont}<br>";
        				echo"<form action=\"Adminquery.php\" method=\"post\">
        					<textarea cols=50 rows=5 required=\"yes\" name =\"query\"></textarea><br>
							<button type=\"submit\" name=\"post\">POST</button>
							</form>";
							if(isset($_POST['post']))
								{
									header("Refresh:0");
									$reply=$_POST['query'];
									$q="Update query set Query_reply='$reply' where Query_id=$id";
									mysqli_query($connection,$q);
								}

    				}
    				?>
	</div>
</body>
</html>