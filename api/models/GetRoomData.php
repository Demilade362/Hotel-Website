<?php
class GetRoomData
{
    private $conn;
    private $table = 'roomdata';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id;
    public $room_name;
    public $description;
    public $price;
    public $link;
    public $createdAt;

    public function read()
    {
        $sql = "SELECT id, room_name, description, price, link, createdAt FROM " . $this->table;

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function read_single()
    {
        $sql = "SELECT id, room_name, description, price, link, createdAt FROM " . $this->table . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->room_name = $row['room_name'];
        $this->description = $row['description'];
        $this->price = $row['price'];
        $this->link = $row['link'];
        $this->createdAt = $row['createdAt'];
    }

    public function create()
    {
        $sql = "INSERT INTO". $this->table ."(room_name, description, price) VALUES(:room_name, :description, :price)";

        $stmt = $this->conn->prepare($sql);

        $this->room_name = htmlspecialchars(strip_tags($this->room_name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));

        $stmt->bindParam(":room_name", $this->room_name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);

        if ($stmt->execute()) {
            return true;
        }
        printf("ERROR: %s \n", $stmt->error);
        return false;
    }

    public function update(){
        $sql = "UPDATE". $this->table ."
        SET 
            room_name = :room_name, 
            description = :description,
            price = :price
        WHERE 
            id = :id";

        $stmt = $this->conn->prepare($sql);

        $this->room_name = htmlspecialchars(strip_tags($this->room_name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":room_name", $this->room_name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        printf("ERROR: %s \n", $stmt->error);
        return false;
    }

    public function delete(){
        $sql = "DELETE FROM " . $this->table . "WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        printf("ERROR: %s \n", $stmt->error);
        return false;
    }
}
