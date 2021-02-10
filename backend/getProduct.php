<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');

$sql = "SELECT * FROM `product`";
$result = $conn->query($sql);
$product = [];
while($row=mysqli_fetch_assoc($result)){

 array_push($product,$row);

}
print_r(json_encode($product));
?>