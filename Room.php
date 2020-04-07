<?php
	require('db.php');
	session_start();
	$room=$_SESSION['room'];
	echo "<h2 align=\"center\"><u>Room$room</u></h2>";
	$q="Select * from room where Room_no=$room";
	$result=mysqli_query($connection,$q);
	while($row=mysqli_fetch_assoc($result))
	{
		$cc=$row['Col_count'];
	}
	if ($cc==2) {
		$q="Select * from room$room";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
			$c1=$row['col1'];
			$c2=$row['col2'];
		}
		echo "<table border=\"1\" style=\"float:left;border-collapse:collapse;\">";
		$q="select * from col$c1";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['c1'] . "</td>";
			echo "<td><pre>    </pre></td>";
			echo "<td>" . $row['c3'] . "</td>";
			echo"</tr>";
		}
		echo "</table>";
		echo "<table border=\"1\"  style=\"border-collapse: collapse;\" align=\"center\">";
		$q="select * from col$c2";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['c1'] . "</td>";
			echo "<td><pre>    </pre></td>";
			echo "<td>" . $row['c3'] . "</td>";
			echo"</tr>";
		}
		echo "</table>";
	}
	else if ($cc==3) {
		$q="Select * from room$room";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
			$c1=$row['col1'];
			$c2=$row['col2'];
			$c3=$row['col3'];
		}
		echo "<table border=\"1\" style=\"float:left;margin-right:480px;border-collapse:collapse;\">";
		$q="select * from col$c1";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['c1'] . "</td>";
			echo "<td><pre>    </pre></td>";
			echo "<td>" . $row['c3'] . "</td>";
			echo"</tr>";
		}
		echo "</table>";
		echo "<table border=\"1\"  style=\"float:left;margin-right:480px;border-collapse:collapse;\">";
		$q="select * from col$c2";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['c1'] . "</td>";
			echo "<td><pre>    </pre></td>";
			echo "<td>" . $row['c3'] . "</td>";
			echo"</tr>";
		}
		echo "</table>";
		echo "<table border=\"1\"style=\"border-collapse:collapse;\">";
		$q="select * from col$c3";
		$result=mysqli_query($connection,$q);
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['c1'] . "</td>";
			echo "<td><pre>    </pre></td>";
			echo "<td>" . $row['c3'] . "</td>";
			echo"</tr>";
		}
		echo "</table>";
	}
	?>