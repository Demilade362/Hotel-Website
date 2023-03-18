<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Verdana;
    }

    h1 {
        text-align: center;
        margin: 0 0 20px 0;
        font-weight: 200;
        color: #ffa500 !important;
    }

    .container {
        max-width: 600px;
        margin: 6rem auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.3);
    }

    .text-dark {
        color: #7a7a7a;
    }

    input[type="text"],
    input[type="email"] {
        display: block;
        width: 100%;
        padding: 10px 2px;
        border-radius: 5px;
        margin: 10px 0;
        font-size: 20px;
        border: 2px solid #ffa500;
    }


    input[type="password"] {
        display: block;
        width: 100%;
        padding: 10px 2px;
        border-radius: 5px;
        margin: 10px 0;
        font-size: 30px;
        border: 2px solid #ffa500;
    }

    input[type="number"] {
        display: block;
        width: 100%;
        padding: 10px 2px;
        border-radius: 5px;
        margin: 10px 0;
        font-size: 20px;
        border: 2px solid #ffa500;
    }

    input[type="date"] {
        display: block;
        width: 100%;
        padding: 10px 2px;
        border-radius: 5px;
        margin: 10px 0;
        font-size: 20px;
        border: 2px solid #ffa500;
    }



    #label {
        font-variant-caps: all-petite-caps;
        color: #7a7a7a;
    }

    input[type='submit'] {
        width: 100%;
        font-size: 20px;
        color: #fff;
        background: #ffa500;
        border: none;
        border-radius: 5px;
        padding: 10px;
        margin: 30px 0;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.05);
        cursor: pointer;
    }

    #error {
        color: #dc143c;
        font-variant-caps: petite-caps;
        margin-bottom: 30px;
    }

    .success {
        color: #ffffff;
        background-color: rgb(0, 255, 98);
        padding: 10px;
        margin: 0 0 15px 0;
        text-align: center;
        border-radius: 5px;
    }

    .lead {
        color: #7a7a7a;
        font-weight: 100;
    }

    .link {
        text-decoration: none;
        color: #1e90ff;
    }

    @media screen and (max-width: 700px) {
        .container {
            margin: 5rem auto;
        }
    }
</style>