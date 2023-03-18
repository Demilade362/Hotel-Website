<div class="backdrop" style="display:none;">
    <div class="offcanvas">
        <a href="home.php" class="navbar-brand">
            Navigation
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <img src="assets/house-user-solid.svg" width="30" height="30" alt="rooms" style="margin-bottom: -5px;">
                <a href="home.php" class="nav-link">
                    Our Rooms</a>
            </li>
            <li class="nav-item">
                <img src="assets/icons8-add-50.png" width="30" height="30" alt="rooms" style="margin-bottom: -5px;">
                <a href="apiPage.php" class="nav-link">Our Api</a>
            </li>
            <li class="nav-item">
                <img src="assets/user-solid.svg" width="30" height="30" alt="rooms" style="margin-bottom: -5px;">
                <a href="userProfile.php" class="nav-link">Your Profile</a>
            </li>
            <li class="nav-item">
                <img src="assets/bookmark-regular.svg" width="30" height="30" alt="rooms" style="margin-bottom: -5px;">
                <a href="favourite.php" class="nav-link">
                    Your Favourites (<?php echo count($myResults) ?>)
                </a>
            </li>
            <form action="includes/logout.inc.php" method="POST" class="nav-item">
                <button type="submit" name="submit" class="mybtn">Log out</button>
            </form>
        </ul>

    </div>

</div>