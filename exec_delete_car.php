 <?php include "inc-files/before_content.code"; ?>
 <div id="content">
<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1))
{
	echo "<span class='errMsg'>Нямате права...!</span>";
	exit;
}

$mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName); 
$mysqli->set_charset('utf8'); 

$result = $mysqli->query("SELECT * FROM tbl_cars where id_car=".$_REQUEST['del_id']);
$row = $result->fetch_assoc();
if ($row['picture']) unlink("pictures/".$row['picture']);
if ($mysqli->query("delete FROM tbl_cars where id_car=".$_REQUEST['del_id']))
	echo "Данните за посочената кола са изтрити.<br>";

$mysqli->close();
?>
<script>setTimeout('self.location.href="list_cars.php"',2500)</script>
 </div>
 <?php include "inc-files/after_content.code"; ?>
