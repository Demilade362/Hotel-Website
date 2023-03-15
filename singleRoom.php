<?php
session_start();
require "config/db_connect.php";
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
} else {
    $errors = '';

    class ErrorClass
    {
        private static $error = [];

        public function myError($key, $msg)
        {
            self::$error[$key] = $msg;
        }

        public function showError($key)
        {
            return self::$error[$key];
        }
    }


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $random = $_SESSION['random'];
        $sql = "SELECT * FROM roomdata WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
        $result = $stmt->fetch();
    }
    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO favourite(userID, RoomID, Name, Price, picture) VALUES(:userID, :RoomID, :Name, :Price, :Picture)";
        $stmt = $pdo->prepare($sql);
        $id = $_SESSION['userId'];
        $roomId = htmlspecialchars(strip_tags($_POST['RoomID']));
        $name = htmlspecialchars(strip_tags($_POST['RoomName']));
        $price = htmlspecialchars(strip_tags($_POST['RoomPrice']));
        $picture = htmlspecialchars(strip_tags($_POST['RoomPicture']));

        if ($stmt->execute([
            ":userID" => $id,
            ":RoomID" => $roomId,
            ":Name" => $name,
            ":Price" => $price,
            ":Picture" => $picture
        ])) {
            header("Location: favourite.php");
        } else {
            $errorClass = new ErrorClass();
            $errorClass->myError("InsertError", "Couldn't Add to Favourite");
            $errors = $errorClass->showError("InsertError");
        }
    } else {
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include_once "templates/styles.php" ?>
</head>

<body>
    <?php include_once "templates/navbar.php" ?>
    <div class="singleContainer">
        <?php if (isset($result)) : ?>
            <?php if ($errors) : ?>
                <div class="error">
                    <?php echo $error ?? '' ?>
                </div>
            <?php endif; ?>
            <?php if ($result->picture) : ?>
                <img class="singleImg" src="<?php echo $result->picture; ?>" alt="<?php echo $result->picture; ?>" />
                <h3><?php echo $result->room_name; ?></h3>
                <p><?php echo $result->description; ?></p>
                <div class="d-flex">
                    <p id="price">Price: &#8358;<?php echo $result->price ?></p>
                    <p id="<?php echo $result->booked ? 'booked' : 'notBooked' ?>">
                        Availablity:
                        <?php echo $result->booked ? 'Room Booked' : 'Not Booked' ?>
                    </p>
                </div>
                <div style="margin-top: 20px;">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="hidden" name="RoomID" value="<?php echo $result->id ?>">
                        <input type="hidden" name="RoomName" value="<?php echo $result->room_name ?>">
                        <input type="hidden" name="RoomPrice" value="<?php echo $result->price ?>">
                        <input type="hidden" name="RoomPicture" value="<?php echo $result->picture ?>">
                        <button type="submit" name="submit" class="btn">Add to Favourites</button>
                    </form>
                </div>
                <a href="#" class="card-btn">Book Now</a>
            <?php else : ?>
                <?php if ($random == 1) : ?>
                    <img class="singleImg" src="assets/apartment1.jfif" alt="apartment1">
                <?php elseif ($random == 2) : ?>
                    <img class="singleImg" src="assets/apartment2.jfif" alt="apartment2">
                <?php elseif ($random == 3) : ?>
                    <img class="singleImg" src="assets/apartment8.jfif" alt="apartment8">
                <?php elseif ($random == 4) : ?>
                    <img class="singleImg" src="assets/apartment9.jfif" alt="apartment8">
                <?php elseif ($random == 5) : ?>
                    <img class="singleImg" src="assets/apartment10.jfif" alt="apartment8">
                <?php elseif ($random == 6) : ?>
                    <img class="singleImg" src="assets/apartment7.jfif" alt="apartment8">
                <?php elseif ($random == 7) : ?>
                    <img class="singleImg" src="assets/apartment6.jfif" alt="apartment8">
                <?php endif; ?>
                <h3><?php echo $result->room_name; ?></h3>
                <p><?php echo $result->description; ?></p>
                <div class="d-flex">
                    <p id="price">Price: &#8358;<?php echo $result->price ?></p>
                    <p id="<?php echo $result->booked ? 'booked' : 'notBooked' ?>">
                        Availablity:
                        <?php echo $result->booked ? 'Room Booked' : 'Not Booked' ?>
                    </p>
                </div>
                <a href="#" class="card-btn">Book Now</a>
            <?php endif; ?>

        <?php else : ?>
            <p>Room Record Not found</p>
        <?php endif; ?>
    </div>
    <?php include_once "templates/footer.php" ?>
</body>

</html>