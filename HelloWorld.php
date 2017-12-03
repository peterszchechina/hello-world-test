<!DOCTYPE HTML>
<HTML>
<HEAD>

</HEAD>
<BODY>

Hello World<br>

<?PHP
	echo "Hello World<br><br>";

	$servername = "eu-cdbr-azure-west-b.cloudapp.net";
	$username = "peterszchechina@interview";
	$password = "Feynman6#!";
	$dbname = "interview";
	
	$connection = new mysql($servername, $username, $password, $dbname);

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
