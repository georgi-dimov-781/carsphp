<?php include "inc-files/before_content.code"; ?>

<div id="content">

<?php
$mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName);
$mysqli ->set_charset('utf8');
$result = $mysqli->query("SELECT * FROM tbl_users where username='". $_POST["username"] . "' and password='" . $_POST["passwd"] . "'");
echo $mysqli->error;
$mysqli->close();

if ($row = $result->fetch_assoc())
	{
		$_SESSION["username"] = htmlspecialchars(stripslashes($row["username"]));
		$_SESSION["usertype"] = htmlspecialchars(stripslashes($row["usertype"]));
		$_SESSION["personname"] = htmlspecialchars(stripslashes($row["personname"]));
		header("Location: .");
		exit;
		
	}
	
	
	else echo "<span class = 'errMsg'>Невалидно потребителско име или грешна парола!</span>";
	
	?>
	</div>
	
	<?php include "inc-files/after_content.code"; ?>