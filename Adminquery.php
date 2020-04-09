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
								<li><a href="Adminhome.html" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="Adminquery.php">&nbsp;VIEW QUERY&nbsp;</a></li>
								<li><a href="#">PUBLISH NOTICE</a>
								<li><a href="#">RESULT</a></li>
								<li><a href="#">VIEW STUDENT DETAILS</a></li>
								<li><a href="AdminLogin.php">LOGOUT</a></li>
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>	
	<div class="login">
		<h2 align="center">Queries</h2>
		<hr>
		<?php 
				 	require ('db.php');
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
