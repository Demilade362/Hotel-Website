<?php
session_start();
require "config/db_connect.php";

$username = $_SESSION['username'];
$sql = "SELECT * FROM userdata WHERE username = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$username]);
$result = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WyteMart | Profile Page</title>
    <?php include "templates/styles.php" ?>
</head>

<body>
    <?php include "templates/navbar.php" ?>
    <div class="profile-container">
        <?php if ($result) : ?>
            <main>
                <div class="identity">
                    <h2><?php echo $result->username ?? "Guest" ?></h2>
                    <?php if(isset($result->picture)): ?>
                    <?php else : ?>
                        <img src="assets/user-solid.svg" width="100" height="100" alt="User display picture">
                    <?php endif; ?>

                </div>
                <div class="profile-info">
                    <p>Your Email: <?php echo $result->email ?></p>
                    <p>You Join on <?php echo $result->createdAt ?></p>
                </div>
                <div class="profile-button">
                    <button class="btn">Edit Profile</button>
                </div>
            </main>
        <?php endif; ?>
    </div>
    <?php include "templates/footer.php" ?>
</body>

</html>