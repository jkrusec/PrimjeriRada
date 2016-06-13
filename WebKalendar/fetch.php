<?php

$mjesec = date('m');
$dan = date('d');


$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
 

mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$sql = "SELECT * FROM dogadjaji where MONTH(datum) = $mjesec AND DAYOFMONTH(datum) = $dan";
$query = mysql_query($sql) or die(mysql_error());

$empty = true;

	while ($row = mysql_fetch_assoc($query)) {
		$empty = false;
		echo "<p>$row[datum] - $row[naslov]</p>";
	}
	
	if($empty = true){
		echo "<p>Za ovaj datum ne postoji više događaja u bazi.</p>";
	}

?>