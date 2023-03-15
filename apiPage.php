<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WyteMart | Api</title>
    <?php include_once "templates/styles.php" ?>
</head>

<body>
    <?php include_once "templates/navbar.php" ?>
    <div class="api-container">
        <!-- http://localhost/hotel_booking_sys/api/data/roomdata/read.php -->
        <h1>Our WyteMart Api</h1>
        <p>You can connect to Our Api and use it in your project</p>
        <h2>Here is an Example of how our api works</h2>
        <h3>Fetch All the rooms data</h3>
        <h4>EndPoint: <a href="http://localhost/hotel_booking_sys/api/data/roomdata/read.php ">http://localhost/hotel_booking_sys/api/data/roomdata/read.php</a> </h4>
        <div class="roomData">
            <h3>Example:</h3>
            <div>
                <button class="btn" id="showBtn">Fetch Data</button>
            </div>
        </div>
        <div class="show" style="display: none;">
            <div id="app"></div>
        </div>
        <h3>Fetching a Single Id</h3>
        <h4>EndPoint: <a href="http://localhost/hotel_booking_sys/api/data/roomdata/read_single.php?id=1 ">http://localhost/hotel_booking_sys/api/data/roomdata/read_single.php?id=1</a> </h4>
        <div class="roomData">
            <h3>Example:</h3>
            <div>
                <button class="btn" id="singleBtn">Fetch Data</button>
            </div>
        </div>
        <div class="showSingle" style="display: none;">
            <div id="appTwo"></div>
        </div>
    </div>
    <?php include_once "templates/footer.php" ?>
    <script>
        const app = document.querySelector("#app");
        const appTwo = document.querySelector("#appTwo");
        const show = document.querySelector(".show");
        const showBtn = document.querySelector('#showBtn')
        const showSingle = document.querySelector(".showSingle");
        const singleBtn = document.querySelector("#singleBtn");
        const url = "http://localhost/hotel_booking_sys/api/data/roomdata/read.php"
        const url2 = "http://localhost/hotel_booking_sys/api/data/roomdata/read_single.php?id=1"


        async function fetchApi() {
            fetch(url)
                .then(res => {
                    return res.json();
                })
                .then(data => {
                    app.innerHTML += JSON.stringify(data)
                })
                .catch(err => err.message)
        }

        showBtn.addEventListener('click', () => {
            fetchApi();
            show.style.display = 'block'
        })

        async function fetchSingle() {
            fetch(url2)
                .then(res => {
                    return res.json();
                })
                .then(data => {
                    appTwo.innerHTML += JSON.stringify(data)
                })
                .catch(err => err.message)
        }

        singleBtn.addEventListener('click', () => {
            fetchSingle();
            showSingle.style.display = 'block';
        })
    </script>
</body>

</html>