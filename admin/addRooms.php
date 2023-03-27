<?php
session_start();
include_once "../config/db_connect.php";

$error= null;

if (isset($_POST['submit'])) {
    $file = $_FILES['picture'];

    $fileName = $_FILES['picture']['name'];
    $fileTmpName = $_FILES['picture']['tmp_name'];
    $fileSize = $_FILES['picture']['size'];
    $fileError = $_FILES['picture']['error'];
    $fileType = $_FILES['picture']['type'];


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowedExt = ['jpg', 'jpeg', 'png', 'jfif'];

    if(in_array($fileActualExt, $allowedExt)){ if($fileError === 0){ if
    ($fileSize < 1000000){ $fileNameNew = uniqid($fileName, true) . '.' .
        $fileActualExt; $fileDestination = 'uploads/'. $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination); 

        $query = "INSERT INTO roomdata(room_name, description, price, picture) VALUES (:room_name, :description, :price, :picture)";

        $roomName = $_POST['roomName'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $picture = $fileDestination;
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ":room_name" => $roomName,
            ":description" => $description,
            ":price" => $price,
            ":picture" => $picture
        ]);
     }
     } else { $error = "There is A problem in the Upload of this
    image"; } } else { $error = "You can't upload this type of file"; } }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>WyteMart | Add Room</title>
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
                <li><a href="adminHome.php">All Users</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="addRooms.php" class="active">Add Rooms</a></li>
                <li><a href="#">Booked Rooms</a></li>
            </ul>
        </nav>
        <h1 class="add">Add Rooms</h1>
        <div class="form-container">
            <div class="error">
                <?php if($error): ?>
                    <?php echo $error; ?>
                <?php endif; ?>
            </div>
            <form action="addRooms.php" method="POST" enctype="multipart/form-data">
                <label for="roomName" id="label">Room Name: </label>
                <input type="text" name="roomName">
                <label for="price" id="label">Room Price: </label>
                <input type="number" name="price">
                <label for="roomName" id="label">Room Description: </label>
                <textarea name="description" cols="30" rows="10"></textarea>
                <label for="roomName" id="label">Room Picture: </label>
                <input type="file" name="picture">
                <input type="submit" name="submit" value="Add Room">
            </form>
        </div>
    </div>
</body>

</html>