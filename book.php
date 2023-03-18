<?php
include "config/db_connect.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
} elseif (!isset($_GET['id'])) {
    header('Location: home.php');
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM roomdata WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);

        $result = $stmt->fetch();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WyteMart Book Now | <?php echo $_SESSION['username'] ?? " " ?></title>
    <?php include "templates/formStyle.php" ?>
</head>

<body>
    <?php include "templates/navbar.php" ?>
    <div class="book-container">
        <?php if ($result) : ?>
            <h1 id="#navbar-brand">Wyte<span class="text-dark">Mart Book Room</span></h1>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <!-- <?php if ($success) : ?>
                <div class="success">
                    <?php echo $success ?? '' ?>
                </div>
            <?php endif; ?> -->
                <label id="label" for="roomName">Room Name:</label>
                <input type="text" name="roomName" value="<?php echo $result->room_name ?? '' ?>" disabled>
                <!-- <div id="error">
                <?php echo $errors['username'] ?? '' ?>
            </div> -->
                <label id="label" for="username">Username:</label>
                <input type="text" name="username" value="<?php echo $_SESSION['username'] ?? '' ?>" disabled>
                <!-- <div id="error">
                <?php echo $errors['username'] ?? '' ?>
            </div> -->

                <label id="label" for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $_SESSION['email'] ?? '' ?> " disabled>
                <!-- <div id="error">
                <?php echo $errors['email'] ?? '' ?>
            </div> -->

                <label id="label" for="password">password:</label>
                <input type="password" name="password" value="<?php echo $_POST['password'] ?? '' ?>">
                <!-- <div id="error">
                <?php echo $errors['password'] ?? '' ?>
            </div> -->

                <label id="label" for="creditCard">Credit Card Info:</label>
                <input type="number" name="creditCard" value="<?php echo $_POST['creditCardd'] ?? '' ?>">
                <!-- <div id="error">
                <?php echo $errors['creditCard'] ?? '' ?>
            </div> -->
                <label for="date" id="label">Choose Time Duration:</label>
                <input type="date" name="date">
                <input type="submit" value="Book Now" name="submit" id="submit">
            <?php endif; ?>
    </div>
    <?php include "templates/offcanvas.php" ?>
    <?php include "templates/footer.php" ?>
    <script src="js/app.js"></script>
</body>

</html>