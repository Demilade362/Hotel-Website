<?php
session_start();
require "config/db_connect.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $random = $_GET['random'];
    $sql = "SELECT * FROM roomdata WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id" => $id
    ]);
    $result = $stmt->fetch();
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
        <?php if ($result) : ?>
            <?php if ($result->picture) : ?>
                <img src="<?php echo $result->picture; ?>" alt="<?php echo $result->picture; ?>">
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
            <?php else : ?>
                <?php if ($random == 1) : ?>
                    <img src="assets/apartment1.jfif" alt="apartment1">
                <?php elseif ($random == 2) : ?>
                    <img src="assets/apartment2.jfif" alt="apartment2">
                <?php elseif ($random == 3) : ?>
                    <img src="assets/apartment8.jfif" alt="apartment8">
                <?php elseif ($random == 4) : ?>
                    <img src="assets/apartment9.jfif" alt="apartment8">
                <?php elseif ($random == 5) : ?>
                    <img src="assets/apartment10.jfif" alt="apartment8">
                <?php elseif ($random == 6) : ?>
                    <img src="assets/apartment7.jfif" alt="apartment8">
                <?php elseif ($random == 7) : ?>
                    <img src="assets/apartment6.jfif" alt="apartment8">
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
        <?php endif; ?>
    </div>
    <?php include_once "templates/footer.php" ?>
</body>

</html>