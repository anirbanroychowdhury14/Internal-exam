<?php
	require('db.php');
	session_start();
	$room=$_SESSION['room'];
	echo "<h2 align=\"center\"><u>Room$room</u></h2>";
	$q="Select * from student_room where Room_no=$room order by Roll";
	$result=mysqli_query($connection,$q);
	$r1=0;
	$r2=0;
	$r3=0;
	$r4=0;
	$r5=0;
	$r6=0;
	$r7=0;
	$r8=0;
	$r9=0;
	$r10=0;
	$r11=0;
	$r12=0;
	$r13=0;
	$r14=0;
	$r15=0;
	$r16=0;
	while($row=mysqli_fetch_assoc($result))
	{
		echo $row['Roll']." ";
		if($row['Roll']>1100 AND $row['Roll']<1200)
			$r1=11;
		if($row['Roll']>1200 AND $row['Roll']<1300)
			$r2=12;
		if($row['Roll']>1300 AND $row['Roll']<1400)
			$r3=13;
		if($row['Roll']>1400 AND $row['Roll']<2100)
			$r4=14;
		if($row['Roll']>2100 AND $row['Roll']<2200)
			$r5=21;
		if($row['Roll']>2200 AND $row['Roll']<2300)
			$r6=22;
		if($row['Roll']>2300 AND $row['Roll']<2400)
			$r7=23;
		if($row['Roll']>2400 AND $row['Roll']<3100)
			$r8=24;
		if($row['Roll']>3100 AND $row['Roll']<3200)
			$r9=31;
		if($row['Roll']>3200 AND $row['Roll']<3300)
			$r10=32;
		if($row['Roll']>3300 AND $row['Roll']<3400)
			$r11=33;
		if($row['Roll']>3400 AND $row['Roll']<4100)
			$r12=34;
		if($row['Roll']>4100 AND $row['Roll']<4200)
			$r13=41;
		if($row['Roll']>4200 AND $row['Roll']<4300)
			$r14=42;
		if($row['Roll']>4300 AND $row['Roll']<4400)
			$r15=43;
		if($row['Roll']>4400)
			$r16=44;
	}
	$q="Select * from dept_year_roll where Dy_id=$r1 or Dy_id=$r2 or Dy_id=$r3 or Dy_id=$r4 or Dy_id=$r5 or Dy_id=$r6 or Dy_id=$r7 or Dy_id=$r8 or Dy_id=$r9 or Dy_id=$r10 or Dy_id=$r11 or Dy_id=$r12 or Dy_id=$r13 or Dy_id=$r14 or Dy_id=$r15 or Dy_id=$r16";
	$result=mysqli_query($connection,$q);
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<br>". $row['Dy_id']."--->".$row['Department']." ".$row['Year']."Year";
	}
?>