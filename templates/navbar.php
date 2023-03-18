<?php
include "config/db_connect.php";
$query = "SELECT * FROM favourite WHERE userId = :id";
$stmt = $pdo->prepare($query);
$userid = $_SESSION['userId'];
$stmt->execute([
    ":id" => $userid
]);

$myResults = $stmt->fetchAll();
?>
<?php include "styles.php" ?>
<div class="container-extra">
    <nav>
        <img src="./assets/bars-solid.svg" alt="navbar-bars" width="30" height="30" id="nav-toggle">
        <a href="home.php" class="navbar-brand">
            Wyte<span class="text-dark">Mart</span>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="home.php" class="nav-link">Our Rooms</a>
            </li>
            <li class="nav-item">
                <a href="apiPage.php" class="nav-link">Our Api</a>
            </li>
            <li class="nav-item">
                <a href="userProfile.php" class="nav-link">Your Profile</a>
            </li>
            <li class="nav-item">
                <a href="favourite.php" class="nav-link">
                    Your Favourites (<?php echo count($myResults) ?>)
                </a>
            </li>
            <form action="includes/logout.inc.php" method="POST" class="nav-item">
                <button type="submit" name="submit" class="btn">Log out</button>
            </form>
        </ul>
    </nav>
</div>