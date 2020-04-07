<?php
	session_start();
	$dept=$_SESSION['dept'];
	$year=$_SESSION['year'];
	$roll=$_SESSION['eroll'];
	$droll=round($roll/2);
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
	for ($i=1; $i <=$droll ; $i++) { 
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td><pre>                                                                                 </pre></td>";
		echo"</tr>";
	}
	echo"</table>";
	echo "<table border=\"1\"  style=\"float:left;border-collapse: collapse;\">";
	for ($i=$droll+1; $i <=$roll ; $i++) { 
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td><pre>                                                                                 </pre></td>";
		echo"</tr>";
	}
	echo"</table>";
?>