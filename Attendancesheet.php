<?php
	session_start();
	require('db.php');
	$dept=$_SESSION['dept'];
	$year=$_SESSION['year'];
	$q="Select * from dept_year_roll where Year='$year' AND Department='$dept'";
	$result=mysqli_query($connection,$q);
	while ($row=mysqli_fetch_assoc($result)) {
		$sroll=$row['Sroll'];
		$eroll=$row['Eroll'];
	}
	$droll=$eroll-$sroll;
	$droll=$sroll-1+round($droll/2);
	if($dept=="CSE")
		echo "<b>DEPARTMENT:</b>COMPUTER SCIENCE AND ENGINEERING<br>";
	elseif ($dept=="EE") {
		echo "<b>DEPARTMENT:</b>ELECTRICAL ENGINEERING<br>";
	}
	elseif ($dept=="EC") {
		echo "<b>DEPARTMENT:</b>ELECTRIONICS AND COMMUNICATION ENGINEERING<br>";
	}
	elseif ($dept=="IT") {
		echo "<b>DEPARTMENT:</b>INFORMATION TECHNOLOGY<br>";
	}
	echo "<b>YEAR:</b>$year<br>";
	echo "<table border=\"1\"  style=\"float:left;border-collapse: collapse;\" >";
	for ($i=$sroll; $i <=$droll ; $i++) { 
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td><pre>                                                                                 </pre></td>";
		echo"</tr>";
	}
	echo"</table>";
	echo "<table border=\"1\"  style=\"float:left;border-collapse: collapse;\">";
	for ($i=$droll+1; $i <=$eroll ; $i++) { 
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td><pre>                                                                                 </pre></td>";
		echo"</tr>";
	}
	echo"</table>";
?>