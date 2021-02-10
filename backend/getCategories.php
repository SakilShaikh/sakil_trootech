<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');

$sql = "SELECT id, parent_id, category FROM categories WHERE parent_id = 0 ORDER BY category";
$result = $conn->query($sql);
$category = [];
while($row=mysqli_fetch_assoc($result)){

 array_push($category,$row);

}
print_r(json_encode($category));

?>