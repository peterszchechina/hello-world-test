<!DOCTYPE HTML>
<HTML>
<HEAD>

</HEAD>
<BODY>

Hello World<br>
Hello again<br>

<?PHP
	echo "Hello World<br><br>";

	$servername = "interviewx.mysql.database.azure.com";
	$username = "peterszchechina@interviewx";
	$password = "Feynman6#!";
	$dbname = "interviewx";

	//$servername = "eu-cdbr-azure-west-b.cloudapp.net";
	//$username = "peterszchechina@interviewx";
	//$password = "Feynman6#!";
	//$dbname = "interview";

	//$connection = new mysql($servername, $username, $password, $dbname);

	//$connection=mysqli_init(); 
	//[mysqli_ssl_set($connection, NULL, NULL, {ca-cert filename}, NULL, NULL);] 
	//mysqli_real_connect($connection, $servername, {username@servername}, {your_password}, {your_database}, {your_port});

	$connection=mysqli_init(); 
	mysqli_ssl_set($connection, NULL, NULL, {ca-cert filename}, NULL, NULL); 
	mysqli_real_connect($connection, "interviewx.mysql.database.azure.com", "peterszchechina@interviewx", "Feynman6#!", "interviewx", 3306);
	
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}

	$sql = "SELECT idInterview, interviewTitle, interviewText FROM interview";
	$result = $connection->query($sql);

	if($result->num_rows > 0){
		echo "Interview, Title, Notes";
		while($row = $result->fetch_assoc()){
			echo $row["idInterview"]. $row["interviewTitle"]. $row["interviewText"]. "<br>";
		}
	} else {
		echo "No records were returned.";
	}
	
	$connection->close();
?>

</BODY>
</HTML>
