<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require_once "../../config/Database.php";
require_once "../../models/GetRoomData.php";


$database = new Database();
$conn = $database->connect();

$db = new GetRoomData($conn);

$db->id = isset($_GET['id']) ? $_GET['id'] : die();

$db->read_single();

$post_arr = array(
    "id" => $db->id,
    "room_name" => $db->room_name,
    "description" => $db->description,
    "price" => $db->price,
    "link" => $db->link,
    "createdAt" => $db->createdAt
);


print_r(json_encode($post_arr));