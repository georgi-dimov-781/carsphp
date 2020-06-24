 <?php include "inc-files/before_content.code"; ?>
 <div id="content">
<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1))
{
	echo "<span class='errMsg'>Нямате права...!</span>";
	exit;
}
$errMsg="";
if (empty($_POST["price"]))
	$errMsg .="Не е въведена цена!<br>";
else
	if (!is_numeric($_POST["price"])) $errMsg .="Некоректно въведена цена!<br>";
if ($errMsg) 
{
	echo "<span class='errMsg'>".$errMsg."</span><br>";
	echo "<a href='edit_car.php?edit_id=".$_POST["id_car"]."'> Корекция на данните</a>";
}
else
{
  $mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName); 
	$mysqli->set_charset('utf8'); 
	$str_query="update tbl_cars set price=".$_POST["price"].", moreinfo='".$_POST["moreinfo"]."' where id_car=".$_POST["id_car"];
	if ($mysqli->query($str_query))
		echo "Данните са обновени...<br>";
	$mysqli->close();
}
?>
 </div>
 <?php include "inc-files/after_content.code"; ?>
