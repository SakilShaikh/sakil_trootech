<?php 
include "connection.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$json = file_get_contents('php://input');
$data = json_decode($json, 1);
// header('Access-Control-Allow-Origin: *');
if(isset($data['name']) && $data['name'] != ''){
$sql = "INSERT INTO `product`(`name`, `price`, `category`, `subcategry`) 
        VALUES ('".$data['name']."','".$data['price']."','".$data['category']."','".$data['subcategory']."')";

$result = $conn ->query($sql);

if(!$result){
    print_r(json_encode('error'));
}
else{
    print_r(json_encode('sucsess'));
}
}
?>