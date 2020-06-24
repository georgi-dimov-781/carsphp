<?php include "inc-files/before_content.code"; ?>
<script type = "text/javascript">
function removeCar(num)
{
	if(confirm("Изтриване на данни за кола!?"))
		self.location.href="exec_delete_car.php?del_id="+num
}

</script>

<div id="content">
<br>
<?php
$mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName);
$mysqli->set_charset('utf8');

$strQuery="SELECT tbl_cars.*, tbl_makes.make FROM tbl_cars join tbl_makes on tbl_cars.id_make=tbl_makes.id_make order by make";

$result = $mysqli->query($strQuery);

echo "<table border='1' align='center' width='600'>";
if(isset($_SESSION["username"]) && $_SESSION["usertype"]==1)
{
	echo "<tr><th>марка</th><th>цена</th><th colspan='2'>операции</th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		echo "<td><a href='show_car.php?show_id=".$row['id_car']."' title='Подробна информация'>" .htmlspecialchars(stripslashes($row['make'])) . " </a></td><td>".htmlspecialchars(stripslashes($row['price'])). " лв.</td><td><a href='edit_car.php?edit_id=".$row['id_car']."' title='Промяна на цената и на допълнителната информация'>редактиранe</a></td><td><a href='javascript:removeCar(".$row['id_car'].")' title='Изтриване на данните'>изтриване</a></td>";
		echo "</tr>";
	}
}	
	
else 
{
	echo "<tr><th>марка</th><th>цена</th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		echo "<td><a href= 'show_car.php?show_id=".$row['id_car']."' title='Подробна информация'>" .htmlspecialchars(stripslashes($row['make'])) . " </a></td><td>".htmlspecialchars(stripslashes($row['price'])). " лв.</td>";
        echo "</tr>";
	}
}

echo "</table>";
$mysqli->close();
?>
</div>
<?php include "inc-files/after_content.code"; ?>
