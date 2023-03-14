<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require_once "../../config/Database.php";
require_once "../../models/GetRoomData.php";


$database = new Database();
$conn = $database->connect();

$db = new GetRoomData($conn);
$result = $db->read();

$num = $result->rowCount();

if ($num > 0) {
    $room_arr = array();
    $room_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $room_item = array(
            "id" => $id,
            "roomName" => $room_name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "link" => $link,
            "createdAt" => $createdAt
        );

        array_push($room_arr['data'], $room_item);
    }

    echo json_encode($room_arr);
} else {
    echo json_encode(
        array("message" => "No Room Found")
    );
}
