

<html>
	<head>
		<title>
		Dogodilo se na današnji dan.
		</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body >	
		<header>
			<nav>		
				<ul>
					<li><a href="index.html" >Početna</a></li>
					<li><a href="mail.html" >Pošalji e-mail</a></li>
					<li><a href="login.html" >Log in</a></li>
				</ul>
			</nav>	
		</header>
		<article>
			<img src="hourglass.jpg" id="left" />
				<div id="center">
					<h1 id="heading1_up">Dogodilo se na današnji dan:</h1><br>
					<?php include("fetch.php"); ?>
					<h1 id="heading2">Izaberite datum za još događaja:</h1><br>
					<form method="POST" action="fetch2.php">
						Mjesec:&nbsp;&nbsp;<select name="mjesec"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></select>&nbsp;&nbsp;Dan:&nbsp;&nbsp;<select name="dan"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select>&nbsp;&nbsp;<input type="submit" value="Unesi" name="btn_input">
					</form>
					<?php
						$mjesec = mysql_real_escape_string($_POST['mjesec']);
						$dan = mysql_real_escape_string($_POST['dan']);


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
			    </div>
			<img src="hourglass.jpg" id="right"/>
		</article>
		<footer>
			<div id="contact">
			<p>Napravljeno by Josip Krušec</p>
			<p>Projekt Internet programiranje</p>
			<p>Kontakt : jkrusec@etfos.hr</p>
			</div>
		</footer>
	</body>
</html>

