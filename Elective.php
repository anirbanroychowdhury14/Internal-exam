<?php
	require('db.php');
	session_start();
	$dept=$_SESSION['dept'];
	$sem=$_SESSION['sem'];
	if($sem==1)
		echo"<b>SEMESTER: </b>".$sem."st<br>";
	elseif ($sem==2) {
		echo"<b>SEMESTER: </b>".$sem."nd<br>";
	}
	elseif ($sem==3) {
		echo"<b>SEMESTER: </b>".$sem."rd<br>";
	}
	else
	echo"<b>SEMESTER: </b>".$sem."th<br>";
	if($dept=="CSE")
		echo "<b>DEPARTMENT:</b>COMPUTER SCIENCE AND ENGINEERING<br><br>";
	elseif ($dept=="EE") {
		echo "<b>DEPARTMENT:</b>ELECTRICAL ENGINEERING<br><br>";
	}
	elseif ($dept=="EC") {
		echo "<b>DEPARTMENT:</b>ELECTRIONICS AND COMMUNICATION ENGINEERING<br><br>";
	}
	elseif ($dept=="IT") {
		echo "<b>DEPARTMENT:</b>INFORMATION TECHNOLOGY<br<br>";
	}
	$q="Select * from Student_elective where Dept='$dept' AND Semester='$sem'";
	$result=mysqli_query($connection,$q);
	echo "<table border=\"1\"  style=\"border-collapse: collapse;\">";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo"<td>".$row['rollno']."</td>";
		if($row['Subject_1']!="")
			echo"<td>".$row['Subject_1']."</td>";
		if($row['Subject_2']!="")
			echo"<td>".$row['Subject_2']."</td>";
		if($row['Subject_3']!="")
			echo"<td>".$row['Subject_3']."</td>";
		echo"</tr>";
	}
	echo "</table>";
?>