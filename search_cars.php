<?php include "inc-files/before_content.code"; ?>
<div id="content">
<?php
$mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName);
$mysqli->set_charset('utf8');

// form for search criteria
echo "<form method='get' action=''>";
echo "<table align='center'>";
// dropdown for makes
$result_makes = $mysqli->query("SELECT * FROM tbl_makes ORDER BY make");
$selected_make = isset($_GET['make_id']) ? (int)$_GET['make_id'] : 0;

echo "<tr><td>Марка:</td><td><select name='make_id'>";
echo "<option value='0'>Всички</option>";
while($row_make = $result_makes->fetch_assoc())
{
    $sel = ($selected_make == $row_make['id_make']) ? " selected" : "";
    echo "<option value='".htmlspecialchars(stripslashes($row_make['id_make']))."'{$sel}>".htmlspecialchars(stripslashes($row_make['make']))."</option>";
}
echo "</select></td></tr>";
// price range
$price_min = isset($_GET['price_min']) ? (int)$_GET['price_min'] : '';
$price_max = isset($_GET['price_max']) ? (int)$_GET['price_max'] : '';

echo "<tr><td>Мин. цена:</td><td><input type='number' min='0' name='price_min' value='".$price_min."'></td></tr>";
echo "<tr><td>Макс. цена:</td><td><input type='number' min='0' name='price_max' value='".$price_max."'></td></tr>";
echo "<tr><td colspan='2' align='center'><input type='submit' value='Търси'></td></tr>";

echo "</table>";
echo "</form>";

$conditions = array();
if($selected_make > 0)
    $conditions[] = "tbl_cars.id_make=".$selected_make;
if($price_min !== '')
    $conditions[] = "tbl_cars.price >= ".(int)$price_min;
if($price_max !== '')
    $conditions[] = "tbl_cars.price <= ".(int)$price_max;

$strQuery = "SELECT tbl_cars.*, tbl_makes.make FROM tbl_cars join tbl_makes on tbl_cars.id_make=tbl_makes.id_make";
if($conditions)
    $strQuery .= " WHERE ".implode(" AND ", $conditions);
$strQuery .= " order by make";

$result = $mysqli->query($strQuery);

echo "<table border='1' align='center' width='600'>";
echo "<tr><th>марка</th><th>цена</th></tr>";
while($row = $result->fetch_assoc())
{
    echo "<tr>";
    echo "<td><a href='show_car.php?show_id=".$row['id_car']."' title='Подробна информация'>".htmlspecialchars(stripslashes($row['make']))."</a></td><td>".htmlspecialchars(stripslashes($row['price']))." лв.</td>";
    echo "</tr>";
}
echo "</table>";
$mysqli->close();
?>
</div>
<?php include "inc-files/after_content.code"; ?>
