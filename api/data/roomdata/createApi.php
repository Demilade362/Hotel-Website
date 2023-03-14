<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header('Allow-Control-Allow-Methods: POST');
header('Allow-Control-Allow-Headers: Allow-Control-Access-Headers, Content-Type, Allow-Control-Allow-Methods, Authorization, X-Requested-With');

require_once "../../config/Database.php";
require_once "../../models/GetRoomData.php";


$database = new Database();
$conn = $database->connect();

$db = new GetRoomData($conn);

$data = json_decode(file_get_contents("php://input"));

$db->room_name = $data->room_name;
$db->description = $data->description;
$db->price = $data->price;

if($db->create()){
    echo json_encode(array(
        "message" => "Room Added"
    ));
} else {
    echo json_encode(array(
        "message" => "Room Not Added"
    ));
}