<?php
session_start();
require "config/db_connect.php";
$success = '';
$failed = '';
$random = $_SESSION['random'];

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
} else {

    $sql = "SELECT * FROM favourite WHERE userId = :id";
    $stmt = $pdo->prepare($sql);
    $id = $_SESSION["userId"];
    $stmt->execute([
        "id" => $id
    ]);
    $results = $stmt->fetchAll();

    if (isset($_POST['submit'])) {
        $sqlQuery = "DELETE FROM favourite WHERE id = :id";
        $stmt = $pdo->prepare($sqlQuery);
        $delId = $_POST['deleteID'];
        if ($stmt->execute([
            ":id" => $delId
        ])) {
            $success = 'Deleted From Favourite';
            header("Location: favourite.php");
        } else {
            $failed = "Failed To Delete";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WyteMart | Your Favourites</title>
    <?php include "templates/styles.php" ?>
</head>

<body>
    <?php include "templates/navbar.php" ?>

    <div class="fav-container">
        <?php if ($success) : ?>
            <div class="success">
                <?php echo $success ?>
            </div>
        <?php endif; ?>

        <?php if ($failed) : ?>
            <div class="error">
                <?php echo $failed ?>
            </div>
        <?php endif; ?>
        <div class="container-grid">
            <?php foreach ($results as $result) : ?>
                <div>
                    <?php if ($result->picture) : ?>
                        <img class="myImg" src="admin/<?php echo $result->picture; ?>" alt="<?php echo $result->picture; ?>">
                    <?php endif; ?>
                    <h3><?php echo $result->Name ?></h3>
                    <p>&#8358;<?php echo $result->Price ?></p>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="hidden" name="deleteID" value="<?php echo $result->id ?>">
                        <button class="btn" type="submit" name="submit">
                            <img src="assets/icons8-trash-50.png" alt="trash" width="30" height="20">
                        </button>
                    </form>
                    <a href="singleRoom.php?id=<?php echo $result->roomID ?>" class="favBtn btn">View Room</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include "templates/offcanvas.php" ?>
    <?php include "templates/footer.php" ?>
    <script src="js/app.js"></script>
</body>

</html>