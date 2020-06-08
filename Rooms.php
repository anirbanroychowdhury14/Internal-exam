<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link href="Design.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/438f2550f2.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('Image/bg5.jpeg'); background-repeat: no-repeat;background-size: cover;-webkit-background-size: cover;
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
								<li id="m1"><a href="Adminhome.html" id="home-button"><i class="fas fa-home"></i></a></li>
								<li><a href="#">&nbsp;ROOM SETTING&nbsp;</a>
									<ul>
										<li id="m11"><a href="Roomsetting.php">ROOM SET</a></li>
										<li id="m12"><a href="Roomselect.php">VIEW ROOM</a></li>
									</ul>
								<li><a href="Room_roll.php">VIEW ROLL DETAILS</a></li>
								<li><a href="Roll.php">SET ROLL DETAILS</a></li>
								<li id="m3"><a href="Attendance.php">ATTENDANCE SHEET</a></li>	
								<li id="m4"><a href="AdminLogin.php">LOGOUT</a></li>
							</ul>
					</td>
				</tr>
			</table>
		</div>
	</div>	
	</div>
</body>
<?php
	require('db.php');
	session_start();
	$roomno=$_SESSION['room'];
	$col=$_SESSION['col'];
	$rm="ROOM".$roomno;
	if($col==2)
	{
		$q="SELECT * from $rm";
		$result=mysqli_query($connection,$q);
		while($row = mysqli_fetch_assoc($result)) 
		{
			$col1=$row['col1'];
			$col2=$row['col2'];
		}
		echo
			"<div class=\"login1\">
				<h2 align=\"center\">COLUMN 1</h2><hr>
				<form action=\"Rooms.php\" method=\"post\">
					NO OF ROWS
					<input type=\"text\" name =\"row1\" required=\"yes\">
					<hr>
					<h2 align=\"center\">COLUMN 2</h2><hr>
					NO OF ROWS
					<input type=\"text\" name =\"row2\" required=\"yes\"><br>
					<button name=\"set\">SET</button>
				</form>
			</div>";
		if(isset($_POST['set']))
		{
			$row1=$_POST['row1'];
			$row2=$_POST['row2'];
			$col="col".$col1;
			$q="CREATE TABLE `$col` ( `c1` BIGINT NOT NULL , `c2` BIGINT NOT NULL,`c3` BIGINT NOT NULL)";
			mysqli_query($connection,$q);
			$q="SELECT * from dept_year_roll order by rand() limit 4";
			$result=mysqli_query($connection,$q);
			$array = array();
			while($row = mysqli_fetch_assoc($result)){
  				$array[] = $row;
			}
			$r1=$array[0]['Croll'];
			$r2=$array[1]['Croll'];
			$r3=$array[2]['Croll'];
			$r4=$array[3]['Croll'];
			$er1=$array[0]['Eroll'];
			$er2=$array[1]['Eroll'];
			$er3=$array[2]['Eroll'];
			$er4=$array[3]['Eroll'];
			for ($i=1; $i <=$row1; $i++) { 
				if($r1>$er1)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er2 and Eroll<>$er3 and Eroll<>$er4  limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r1=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
  							$array[] = $row;
						}
						$r1=$array[0]['Croll'];
						$er1=$array[0]['Eroll'];
					}
				}
				if($r2>$er2)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er3 and Eroll<>$er4 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r2=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r2=$array[0]['Croll'];
						$er2=$array[0]['Eroll'];
					}
				}
				if($r3>$er3)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er2 and Eroll<>$er4 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r3=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r3=$array[0]['Croll'];
						$er3=$array[0]['Eroll'];
					}
				}
				if($r4>$er4)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er3 and Eroll<>$er2 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r4=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
  							$array[] = $row;
						}
						$r4=$array[0]['Croll'];
						$er4=$array[0]['Eroll'];
					}
				}
				if($i%2!=0)
				{
					$q="Insert into $col(c1,c3) values($r1,$r2)";
					mysqli_query($connection,$q);
					if($r1==0)
					$r1==0;
					else
					{
						$q="Insert into student_room values($r1,$roomno)";
						mysqli_query($connection,$q);
						$r1++;
						$q="Update dept_year_roll set Croll=$r1 where Eroll=$er1";
						mysqli_query($connection,$q);
					}
					if($r2==0)
					{
						$r2=0;
					}
					else
					{
						$q="Insert into student_room values($r2,$roomno)";
						mysqli_query($connection,$q);
						$r2++;
						$q="Update dept_year_roll set Croll=$r2 where Eroll=$er2";
						mysqli_query($connection,$q);
					}
				}
				else
				{
					$q="Insert into $col(c1,c3) values($r3,$r4)";
					mysqli_query($connection,$q);
					if($r3==0)
					$r3==0;
					else
					{
						$q="Insert into student_room values($r3,$roomno)";
						mysqli_query($connection,$q);
						$r3++;
						$q="Update dept_year_roll set Croll=$r3 where Eroll=$er3";
						mysqli_query($connection,$q);
					}
					if($r4==0)
					{
						$r4=0;
					}
					else
					{
						$q="Insert into student_room values($r4,$roomno)";
						mysqli_query($connection,$q);
						$r4++;
						$q="Update dept_year_roll set Croll=$r4 where Eroll=$er4";
						mysqli_query($connection,$q);
					}
					
				}
			}
			$col="col".$col2;
			$q="CREATE TABLE `$col` ( `c1` BIGINT NOT NULL , `c2` BIGINT NOT NULL ,`c3` BIGINT NOT NULL)";
			mysqli_query($connection,$q);
			for ($i=1; $i <=$row2; $i++) { 
				if($r1>$er1)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er2 and Eroll<>$er3 and Eroll<>$er4  limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r1=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
  							$array[] = $row;
						}
						$r1=$array[0]['Croll'];
						$er1=$array[0]['Eroll'];
					}
				}
				if($r2>$er2)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er3 and Eroll<>$er4 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r2=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r2=$array[0]['Croll'];
						$er2=$array[0]['Eroll'];
					}
				}
				if($r3>$er3)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er2 and Eroll<>$er4 limit 1";
					$result=mysqli_query($connection,$q);
					$array = array();
					while($row = mysqli_fetch_assoc($result)){
  						$array[] = $row;
					}
					$r3=$array[0]['Croll'];
					$er3=$array[0]['Eroll'];
				}
				if($r4>$er4)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er3 and Eroll<>$er2 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r4=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r4=$array[0]['Croll'];
						$er4=$array[0]['Eroll'];
					}
				}
				if($i%2!=0)
				{
					$q="Insert into $col(c1,c3) values($r1,$r2)";
					mysqli_query($connection,$q);
					if($r1==0)
					$r1==0;
					else
					{
						$q="Insert into student_room values($r1,$roomno)";
						mysqli_query($connection,$q);
						$r1++;
						$q="Update dept_year_roll set Croll=$r1 where Eroll=$er1";
						mysqli_query($connection,$q);
					}
					if($r2==0)
					{
						$r2=0;
					}
					else
					{
						$q="Insert into student_room values($r2,$roomno)";
						mysqli_query($connection,$q);
						$r2++;
						$q="Update dept_year_roll set Croll=$r2 where Eroll=$er2";
						mysqli_query($connection,$q);
					}
				}
				else
				{
					$q="Insert into $col(c1,c3) values($r3,$r4)";
					mysqli_query($connection,$q);
					if($r3==0)
					$r3==0;
					else
					{
						$q="Insert into student_room values($r3,$roomno)";
						mysqli_query($connection,$q);
						$r3++;
						$q="Update dept_year_roll set Croll=$r3 where Eroll=$er3";
						mysqli_query($connection,$q);
					}
					if($r4==0)
					{
						$r4=0;
					}
					else
					{
						$q="Insert into student_room values($r4,$roomno)";
						mysqli_query($connection,$q);
						$r4++;
						$q="Update dept_year_roll set Croll=$r4 where Eroll=$er4";
						mysqli_query($connection,$q);
					}
				}
			}
			header("Location:Roomsetting.php");
		}
	}
	elseif ($col==3) 
	{
		$q="SELECT * from $rm";
		$result=mysqli_query($connection,$q);
		while($row = mysqli_fetch_assoc($result)) 
		{
			$col1=$row['col1'];
			$col2=$row['col2'];
			$col3=$row['col3'];
		}
		echo
			"<div class=\"login1\">
				<h2 align=\"center\">COLUMN 1</h2><hr>
				<form action=\"Rooms.php\" method=\"post\">
					NO OF ROWS
					<input type=\"text\" name =\"row1\" required=\"yes\">
					<hr>
					<h2 align=\"center\">COLUMN 2</h2><hr>
					NO OF ROWS
					<input type=\"text\" name =\"row2\" required=\"yes\"><br>
					<hr>
					<h2 align=\"center\">COLUMN 3</h2><hr>
					NO OF ROWS
					<input type=\"text\" name =\"row3\" required=\"yes\"><br>
					<button name=\"set\">SET</button>
				</form>
			</div>";
		if(isset($_POST['set']))
		{
			$row1=$_POST['row1'];
			$row2=$_POST['row2'];
			$row3=$_POST['row3'];
			$col="col".$col1;
			$q="CREATE TABLE `$col` ( `c1` BIGINT NOT NULL , `c2` BIGINT NOT NULL,`c3` BIGINT NOT NULL)";
			mysqli_query($connection,$q);
			$q="SELECT * from dept_year_roll order by rand() limit 4";
			$result=mysqli_query($connection,$q);
			$array = array();
			while($row = mysqli_fetch_assoc($result)){
  				$array[] = $row;
			}
			$r1=$array[0]['Croll'];
			$r2=$array[1]['Croll'];
			$r3=$array[2]['Croll'];
			$r4=$array[3]['Croll'];
			$er1=$array[0]['Eroll'];
			$er2=$array[1]['Eroll'];
			$er3=$array[2]['Eroll'];
			$er4=$array[3]['Eroll'];
			for ($i=1; $i <=$row1; $i++) { 
				if($r1>$er1)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er2 and Eroll<>$er3 and Eroll<>$er4  limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r1=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
  							$array[] = $row;
						}
						$r1=$array[0]['Croll'];
						$er1=$array[0]['Eroll'];
					}
				}
				if($r2>$er2)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er3 and Eroll<>$er4 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r2=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r2=$array[0]['Croll'];
						$er2=$array[0]['Eroll'];
					}
				}
				if($r3>$er3)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er2 and Eroll<>$er4 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r3=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r3=$array[0]['Croll'];
						$er3=$array[0]['Eroll'];
					}
				}
				if($r4>$er4)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er3 and Eroll<>$er2 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r4=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r4=$array[0]['Croll'];
						$er4=$array[0]['Eroll'];
					}
				}
				if($i%2!=0)
				{
					$q="Insert into $col(c1,c3) values($r1,$r2)";
					mysqli_query($connection,$q);
					if($r1==0)
					$r1==0;
					else
					{
						$q="Insert into student_room values($r1,$roomno)";
						mysqli_query($connection,$q);
						$r1++;
						$q="Update dept_year_roll set Croll=$r1 where Eroll=$er1";
						mysqli_query($connection,$q);
					}
					if($r2==0)
					{
						$r2=0;
					}
					else
					{
						$q="Insert into student_room values($r2,$roomno)";
						mysqli_query($connection,$q);
						$r2++;
						$q="Update dept_year_roll set Croll=$r2 where Eroll=$er2";
						mysqli_query($connection,$q);
					}
				}
				else
				{
					$q="Insert into $col(c1,c3) values($r3,$r4)";
					mysqli_query($connection,$q);
					if($r3==0)
					$r3==0;
					else
					{
						$q="Insert into student_room values($r3,$roomno)";
						mysqli_query($connection,$q);
						$r3++;
						$q="Update dept_year_roll set Croll=$r3 where Eroll=$er3";
						mysqli_query($connection,$q);
					}
					if($r4==0)
					{
						$r4=0;
					}
					else
					{
						$q="Insert into student_room values($r4,$roomno)";
						mysqli_query($connection,$q);
						$r4++;
						$q="Update dept_year_roll set Croll=$r4 where Eroll=$er4";
						mysqli_query($connection,$q);
					}
				}
			}
			$col="col".$col2;
			$q="CREATE TABLE `$col` ( `c1` BIGINT NOT NULL , `c2` BIGINT NOT NULL ,`c3` BIGINT NOT NULL)";
			mysqli_query($connection,$q);
			for ($i=1; $i <=$row2; $i++) { 
				if($r1>$er1)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er2 and Eroll<>$er3 and Eroll<>$er4  limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r1=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
  							$array[] = $row;
						}
						$r1=$array[0]['Croll'];
						$er1=$array[0]['Eroll'];
					}
				}
				if($r2>$er2)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er3 and Eroll<>$er4 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r2=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r2=$array[0]['Croll'];
						$er2=$array[0]['Eroll'];
					}
				}
				if($r3>$er3)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er2 and Eroll<>$er4 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r3=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r3=$array[0]['Croll'];
						$er3=$array[0]['Eroll'];
					}
				}
				if($r4>$er4)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er3 and Eroll<>$er2 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r4=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r4=$array[0]['Croll'];
						$er4=$array[0]['Eroll'];
					}
				}
				if($i%2!=0)
				{
					$q="Insert into $col(c1,c3) values($r1,$r2)";
					mysqli_query($connection,$q);
					if($r1==0)
					$r1==0;
					else
					{
						$q="Insert into student_room values($r1,$roomno)";
						mysqli_query($connection,$q);
						$r1++;
						$q="Update dept_year_roll set Croll=$r1 where Eroll=$er1";
						mysqli_query($connection,$q);
					}
					if($r2==0)
					{
						$r2=0;
					}
					else
					{
						$q="Insert into student_room values($r2,$roomno)";
						mysqli_query($connection,$q);
						$r2++;
						$q="Update dept_year_roll set Croll=$r2 where Eroll=$er2";
						mysqli_query($connection,$q);
					}
				}
				else
				{
					$q="Insert into $col(c1,c3) values($r3,$r4)";
					mysqli_query($connection,$q);
					if($r3==0)
					$r3==0;
					else
					{
						$q="Insert into student_room values($r3,$roomno)";
						mysqli_query($connection,$q);
						$r3++;
						$q="Update dept_year_roll set Croll=$r3 where Eroll=$er3";
						mysqli_query($connection,$q);
					}
					if($r4==0)
					{
						$r4=0;
					}
					else
					{
						$q="Insert into student_room values($r4,$roomno)";
						mysqli_query($connection,$q);
						$r4++;
						$q="Update dept_year_roll set Croll=$r4 where Eroll=$er4";
						mysqli_query($connection,$q);
					}
				}
			}
			$col="col".$col3;
			$q="CREATE TABLE `$col` ( `c1` BIGINT NOT NULL , `c2` BIGINT NOT NULL ,`c3` BIGINT NOT NULL)";
			mysqli_query($connection,$q);
			for ($i=1; $i <=$row3; $i++) { 
				if($r1>$er1)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er2 and Eroll<>$er3 and Eroll<>$er4  limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r1=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
  							$array[] = $row;
						}
						$r1=$array[0]['Croll'];
						$er1=$array[0]['Eroll'];
					}
				}
				if($r2>$er2)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er3 and Eroll<>$er4 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r2=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r2=$array[0]['Croll'];
						$er2=$array[0]['Eroll'];
					}
				}
				if($r3>$er3)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er2 and Eroll<>$er4 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r3=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r3=$array[0]['Croll'];
						$er3=$array[0]['Eroll'];
					}
				}
				if($r4>$er4)
				{
					$q="SELECT * from dept_year_roll where Croll<=Eroll and Eroll<>$er1 and Eroll<>$er3 and Eroll<>$er2 limit 1";
					$result=mysqli_query($connection,$q);
					if(mysqli_num_rows($result)==0)
						$r4=0;
					else
					{
						$array = array();
						while($row = mysqli_fetch_assoc($result)){
	  						$array[] = $row;
						}
						$r4=$array[0]['Croll'];
						$er4=$array[0]['Eroll'];
					}
				}
				if($i%2!=0)
				{
					$q="Insert into $col(c1,c3) values($r1,$r2)";
					mysqli_query($connection,$q);
					if($r1==0)
					$r1==0;
					else
					{
						$q="Insert into student_room values($r1,$roomno)";
						mysqli_query($connection,$q);
						$r1++;
						$q="Update dept_year_roll set Croll=$r1 where Eroll=$er1";
						mysqli_query($connection,$q);
					}
					if($r2==0)
					{
						$r2=0;
					}
					else
					{
						$q="Insert into student_room values($r2,$roomno)";
						mysqli_query($connection,$q);
						$r2++;
						$q="Update dept_year_roll set Croll=$r2 where Eroll=$er2";
						mysqli_query($connection,$q);
					}
				}
				else
				{
					$q="Insert into $col(c1,c3) values($r3,$r4)";
					mysqli_query($connection,$q);
					if($r3==0)
					$r3==0;
					else
					{
						$q="Insert into student_room values($r3,$roomno)";
						mysqli_query($connection,$q);
						$r3++;
						$q="Update dept_year_roll set Croll=$r3 where Eroll=$er3";
						mysqli_query($connection,$q);
					}
					if($r4==0)
					{
						$r4=0;
					}
					else
					{
						$q="Insert into student_room values($r4,$roomno)";
						mysqli_query($connection,$q);
						$r4++;
						$q="Update dept_year_roll set Croll=$r4 where Eroll=$er4";
						mysqli_query($connection,$q);
					}
				}
			}
			header("Location:Roomsetting.php");
		}
	}
	
?>