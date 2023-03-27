<?php
session_start();
include_once "../config/db_connect.php";

$sql = "SELECT * FROM userinfo ORDER BY createdAt DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

if (isset($_POST['delete'])) {
    $deleteId = $_POST['deleteID'];
    $query = "DELETE FROM userinfo WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ":id" => $deleteId
    ]);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>WyteMart | AdminPage</title>
</head>

<body>
    <div class="container">
        <div class="logout">
            <form action="../includes/logout.inc.php" method="POST">
                <button class="btn" type="submit" name="submit">Logout</button>
            </form>
        </div>
        <nav>
            <h1 class="heading">
                <span>
                    Welcome <?php echo $_SESSION['adminEmail'] ?>
                </span>
                <span>
                    DashBoard
                </span>

            </h1>
            <ul class="nav">
                <li><a href="adminHome.php" class="active">All Users</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="addRooms.php">Add Rooms</a></li>
                <li><a href="#">Booked Rooms</a></li>
            </ul>
        </nav>
        <div class="userSection">
            <?php foreach ($results as $result) : ?>
                <ul class="users">
                    <li><?php echo $result->name ?></li> -
                    <li><?php echo $result->email ?></li> -
                    <li><?php echo $result->createdAt ?></li> -
                    <li>
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                            <input type="hidden" name="deleteID" value="<?php echo $result->id ?>">
                            <button class="btn" name="delete" type="submit">
                                <span>
                                    Delete User Account
                                </span>
                            </button>
                        </form>
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>