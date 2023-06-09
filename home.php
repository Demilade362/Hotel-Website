<?php
session_start();
require "config/db_connect.php";
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
} else {
    $sql = "SELECT * FROM roomdata ORDER BY createdAt DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
}

$random = rand(1, 7);

$_SESSION['random'] = $random;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WyteMart | <?php echo $_SESSION['username'] ?? "Guest" ?></title>
    <?php include "templates/styles.php" ?>
</head>

<body style="background-color: #eee;">
    <?php require "templates/navbar.php" ?>
    <div class="my-container-extra">
        <div class="content">
            <h1><span class="greetings">Hello</span> <?php echo $_SESSION['username'] ?? 'Guest' ?></h1>
            <?php if ($_SESSION['pp'] !== false) : ?>
                <img src="assets/user-solid.svg" width="30" height="30" alt="userPic" id="userpic">
            <?php elseif ($_SESSION['pp']) : ?>
            <?php endif; ?>
        </div>
        <div class="grid-container">
            <?php foreach ($results as $result) : ?>
                <div class="card">
                    <?php if ($result->picture) : ?>
                        <img class="homeImg" src="admin/<?php echo $result->picture; ?>" alt="<?php echo $result->picture; ?>">
                    <?php endif; ?>
                    <div class="card-content">
                        <h3><?php echo $result->room_name; ?></h3>
                        <p><?php echo $result->description; ?></p>
                        <div class="d-flex">
                            <p id="price">Price: &#8358;<?php echo $result->price ?></p>
                            <p id="<?php echo $result->booked ? 'booked' : 'notBooked' ?>">
                                Availablity:
                                <?php echo $result->booked ? 'Room Booked' : 'Not Booked' ?>
                            </p>
                        </div>

                        <?php if ($result->booked == false) : ?>
                            <a href="singleRoom.php?id=<?php echo $result->id ?>" class="card-btn">
                                View Room
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include "templates/offcanvas.php" ?>
    <?php include("templates/footer.php") ?>
    <script src="js/app.js"></script>
</body>

</html>