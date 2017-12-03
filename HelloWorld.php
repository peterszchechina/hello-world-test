<!DOCTYPE HTML>
<HTML>
<HEAD>
<link rel="stylesheet" type="text/css" href="HelloWorld.css">
</HEAD>
<BODY>

<h1>Peter&#39;s PHP Page<br></h1>

<?PHP
	echo "Welcome<br><br> This PHP page, hosted on Azure, reads data from a MySQL database, also hosted on Azure, and places it into the table shown below.<br>,<br>";

	$servername = "interviewx.mysql.database.azure.com";
	$username = "peterszchechina@interviewx";
	$password = "Feynman6#!";
	$dbname = "interview";

	$conn = mysqli_init();
	
	if (!$conn){
		die("mysqli_init failed");
	}
	
	//mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ;
	
	mysqli_real_connect($conn, $servername, $username, $password, $dbname, 3306);

	if (mysqli_connect_errno($conn)) {
		die('Failed to connect to MySQL: '.mysqli_connect_error());
	}

	$sql = "SELECT idInterview, interviewTitle, interviewText FROM interview";

	$res = mysqli_query($conn, $sql);

	echo"<table>";
	echo "<tr><th>Interview</th> <th>Title</th> <th>Notes</th></tr>";	
	while ($row = mysqli_fetch_assoc($res)) {
		//var_dump($row);
		echo "<tr><td>". $row["idInterview"]. "</td><td>". $row["interviewTitle"]. "</td><td>".  $row["interviewText"]. "</td></tr>";

	}	
	echo"</table>";

	mysqli_close($conn);
?>

</BODY>
</HTML>
