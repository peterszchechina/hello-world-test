<!DOCTYPE HTML>
<HTML>
<HEAD>

</HEAD>
<BODY>

Hello World Hello<br>
Hello Hello Hello<br>

<?PHP
	echo "Hello World Hello<br><br>";

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
	//$servername = "eu-cdbr-azure-west-b.cloudapp.net";
	//$username = "peterszchechina@interviewx";
	//$password = "Feynman6#!";
	//$dbname = "interview";

	//$connection = new mysql($servername, $username, $password, $dbname);

	//$connection=mysqli_init(); 
	//[mysqli_ssl_set($connection, NULL, NULL, {ca-cert filename}, NULL, NULL);] 
	//mysqli_real_connect($connection, $servername, {username@servername}, {your_password}, {your_database}, {your_port});

	//$connection=mysqli_init(); 
	//mysqli_ssl_set($connection, NULL, NULL, {ca-cert filename}, NULL, NULL); 
	//mysqli_real_connect($connection, "interviewx.mysql.database.azure.com", "peterszchechina@interviewx", "Feynman6#!", "interviewx", 3306);
	
	//if ($connection->connect_error) {
	//	die("Connection failed: " . $connection->connect_error);
	//}

	$sql = "SELECT idInterview, interviewTitle, interviewText FROM interview";
	//$result = $conn->query($sql);
	$res = mysqli_query($conn, $sql);

	echo "Interview, Title, Notes<br>";	
	while ($row = mysqli_fetch_assoc($res)) {
		//var_dump($row);
		echo $row["idInterview"]. $row["interviewTitle"]. $row["interviewText"]. "<br>";

	}	

	//if($result->num_rows > 0){
	//	echo "Interview, Title, Notes";
	//	while($row = $result->fetch_assoc()){
	//		echo $row["idInterview"]. $row["interviewTitle"]. $row["interviewText"]. "<br>";
	//	}
	//} else {
	//	echo "No records were returned.";
	//}
	
	//$conn->close();
	mysqli_close($conn);
?>

</BODY>
</HTML>
