<?php
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$json = file_get_contents('php://input');
$data = json_decode($json, 1);


$sql = "SELECT id, parent_id, category FROM categories WHERE parent_id = '".$data['id']."' ORDER BY category";
$result = $conn->query($sql);
$category = [];
while($row=mysqli_fetch_assoc($result)){

 array_push($category,$row);

}
print_r(json_encode($category));

?>