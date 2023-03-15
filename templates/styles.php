<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Verdana;
        font-weight: 100;
    }

    body {
        background-color: #eee;
    }

    /* Navbar Styles */

    nav {
        display: flex;
        align-items: center;
        justify-content: space-around;
        background: #fff;
        padding: 25px 0 20px 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1;
        box-shadow: 1px 1px 8px 0 rgba(133, 132, 132, 0.1);
    }

    h1 {
        font-weight: 100;
    }

    .navbar-brand {
        color: #ffa500;
        text-decoration: none;
        font-size: larger;
        font-weight: 100;
    }

    .text-dark {
        color: #858484;
    }

    .navbar-nav {
        list-style: none;
    }

    .nav-item {
        margin: 0 8px 0 8px;
        display: inline-block;
        font-variant: small-caps;
    }

    .nav-link {
        color: #858484;
        text-decoration: none;
    }

    .nav-item:hover {
        text-decoration: underline;
        text-decoration-color: #858484;
        color: #858484;
        transition: 0.1s !important;
        cursor: pointer;
    }


    .btn {
        font-variant: small-caps;
        padding: 10px;
        font-size: 15px;
        color: #fff;
        background: #ffa500;
        border: none;
        border-radius: 5px;
        box-shadow: 1px 1px 0.5px 0.5px rgb(0, 0, 0, 0.05);
        cursor: pointer;
        text-decoration: none;
    }

    /* Home Page Css */
    .my-container-extra {
        max-width: 1000px;
        margin: 8rem auto 7rem auto;
        background: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.2);
    }

    .content {
        display: flex;
        justify-content: space-between;
    }

    #userpic {
        border-radius: 20px;
    }

    .grid-container {
        margin: 3rem 0 20px 0;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        grid-auto-rows: minmax(530px, auto);
    }

    .grid-container>div {
        border: 2px solid #fff;
        color: #858484;
    }

    .card {
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.05);
        border-radius: 5px;
        height: 100%;
        display: grid;
        grid-template-columns: 1fr;
    }

    .card-content {
        padding: 10px;
        position: relative;
    }

    .card-btn {
        justify-self: end;
        font-variant: small-caps;
        padding: 10px;
        font-size: 15px;
        color: #fff;
        background: #ffa500;
        border: none;
        cursor: pointer;
        text-decoration: none;
        width: 100%;
        margin: 10px 0 0 0;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        display: block;
        text-align: center;
    }

    .card .homeImg {
        width: 100%;
        height: 300px;
        overflow: hidden;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .card h3 {
        font-weight: 200;
        text-align: end;
    }

    .card p {
        letter-spacing: 2px;
        line-height: 1.5;
        margin: 10px 0 20px 0;
        font-weight: 100;
    }

    .footer {
        background: #fff;
        color: #858484;
        padding: 3rem;
        text-align: center;
    }

    .width-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .container {
        display: inline-grid;
        grid-template-columns: repeat(2, 1fr);
        justify-content: center;
        align-content: center;
        gap: 10px;
    }

    #price {
        font-weight: 100;
    }

    .d-flex {
        display: flex;
        justify-content: space-between;
        align-content: center;
    }

    #booked {
        color: crimson;
    }

    #notBooked {
        color: green;
    }

    /* Profile Page css */
    .profile-container {
        margin: 10rem auto;
        max-width: 600px;
        background: #fff;
        padding: 40px 60px;
        border-radius: 10px;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.05);
    }

    .identity {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: 1fr;
        text-align: center;
        justify-items: end;
        gap: 30px;
        align-items: center;
    }

    .identity h2 {
        justify-self: start;
        font-weight: 100;
        font-variant: small-caps;
    }

    .identity img {
        border-radius: 50px;
    }

    .profile-info {
        margin: 5em 0;
        line-height: 2;
        letter-spacing: 1px;
    }

    .profile-info p {
        font-weight: 100;
        font-size: large;
        color: #333;
        font-variant-caps: all-small-caps;
    }


    .profile-button {
        display: flex;
        justify-content: space-around;
    }

    .profile-button button {
        width: 100%;
    }

    /* Api Page */
    .api-container {
        max-width: 900px;
        margin: 10rem auto;
        background: #fff;
        padding: 15px;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.05);
        color: #858484;
        border-radius: 10px;
    }

    .api-container h1 {
        font-weight: 100;
        text-align: end !important;
        margin-bottom: 10rem;
    }

    .api-container h2 {
        margin: 10px 0;
        text-decoration: underline;
        font-variant: small-caps;
        text-align: center;
    }

    .api-container h3 {
        text-align: end;
        text-decoration: underline;
        margin: 20px 0 20px 0;
    }


    .api-container p {
        margin: 20px 0;
        font-weight: 100;
    }

    .api-container .roomData {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 30px 0 15px 0;
    }

    .show {
        text-align: start !important;
        line-height: 2;
        letter-spacing: 1px;
    }

    .api-container #app,
    .api-container #appTwo {
        margin: 5rem 0 5rem 0;
        background: #000;
        color: #fff !important;
        padding: 20px;
        border-radius: 10px;
        overflow: scroll;
    }

    /* view Single Room Page */
    .singleContainer {
        max-width: 700px;
        margin: 6rem auto;
        background: #fff;
        padding: 15px;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.05);
        color: #858484;
        border-radius: 10px;
        line-height: 2;
    }

    .singleContainer h3 {
        margin-top: 40px;
    }


    .singleContainer .singleImg {
        width: 100%;
        height: 400px;
        overflow: hidden;
    }

    .singleContainer .card-btn {
        border-radius: 10px !important;
        margin-top: 30px !important;
    }

    /* Favourite Page */

    .fav-container {
        max-width: 1000px;
        margin: 6rem auto;
        background: #fff;
        padding: 30px;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.05);
        color: #858484;
        border-radius: 10px;
    }

    .fav-container .container-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: 550px;
        gap: 30px;
    }

    .container-grid div {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: 2fr;
        box-shadow: 3px 3px 3px rgb(0, 0, 0, 0.05);
        border-radius: 10px;
        line-height: 2;
    }


    .container-grid div .myImg {
        width: 100%;
        height: 100%;
        overflow: hidden;
        grid-column: span 2;
        grid-row: span 1;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .container-grid div h3 {
        margin: 20px 0;
        grid-column: span 2;
    }

    .container-grid div p {
        grid-column: span 1;
        margin: 11px;
    }

    .container-grid div button {
        grid-column: span 1;
        margin: 11px;
    }

    .container-grid div .favBtn {
        grid-column: span 2;
        text-align: center;
        margin-top: 20px;
        border-top-left-radius: 0 !important;
        border-top-right-radius: 0 !important;
    }

    .success {
        background: limegreen;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        margin: 20px 0;
    }

    .error {
        background: crimson;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        margin: 20px 0;
    }




    /* Media Queries for aLL page */

    @media screen and (max-width: 800px) {

        nav {
            justify-content: space-around;
        }

        .card {
            height: 50vh;
        }

        .card img {
            height: 320px;
        }

        .card-btn {
            width: 100%;
        }

        .grid-container {
            grid-template-columns: repeat(1, 1fr);
            grid-auto-rows: minmax(330px, auto);
            grid-row-gap: 30px;
        }

        .my-container-extra {
            margin-top: 4.5rem;
            padding: 10px;
        }

        .card {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .navbar-nav {
            display: none;
        }

        .d-flex {
            display: block;
        }
    }

    @media screen and (max-width: 654px) {
        .grid-container {
            grid-template-columns: repeat(1, 1fr);
            gap: 14px;
        }

        .profile-container {
            margin-top: 10rem;
            margin-bottom: 10rem;
        }

        .container {
            display: block;
        }

        .container p {
            margin-top: 15px;
        }

        .card {
            display: block;
            height: 100%;
            grid-template-columns: repeat(2, 1fr);
        }

        .content {
            justify-content: space-between;
            align-items: center;
        }

        .greetings {
            display: none;
        }

        .card-btn {
            width: 100%;
        }


        .identity img {
            grid-column: 1 / span 2;

        }

        .api-container .roomData {
            display: flex;
            justify-content: space-between;
        }
    }
</style>