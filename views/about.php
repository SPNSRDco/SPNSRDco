<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About - SPNSRD</title>
        <style>
            body {
                background-color: #f5f5f5;
                font-family: Arial, Helvetica, sans-serif;
                text-align: center;
            }
            #header {
                background-color: #fff;
                padding: 1vh;
                margin: auto;
                margin-bottom: -2vh;
                margin-top: -1vh;
                width: 15vh;
                border-radius: 15px;
                height: 8vh;
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            #logo {
                height: 20vh;
                display: flex;
            }
            #main {
                width: 25vw;
                background-color: #fff;
                padding: 1vw;
                height: fit-content;
                padding-top: 3vh;
                padding-bottom: 3vh;
                align-items: center;
                justify-content: center;
                border-radius: 25px;
            }
            #navbar{
                background-color: #fff;
                padding: 1vw;
                border-bottom: 1px solid #ddd;
                width: fit-content;
                margin: auto;
                margin-top: 2vh;
                border-radius: 25px;
                border-bottom: 1px solid #ddd;
            }
            .navopts {
                padding-left: 0.5vw;
                padding-right: 0.5vw;
            }
            .center {
                margin: auto;
            }
            input {
                margin: 1vw;
                display: flex;
            }
        </style>
    </head>
    <body>
        <div id="navbar">
            <div id="header">
                <a id="logo" href="index.php">
                    <img id="logo" src="media.php?image=logo.png" alt="SPNSRD Logo">
                </a>
            </div>       
            <br>
            <a class="navopts" href="index.php">Home</a>
            <a class="navopts" href="about.php">About</a>
            <a class="navopts" href="dash.php">Account</a>
            <a class="navopts" href="Search.php">Search</a>
        </div>
        <br>
        <div class="center" id="main">
            <br>
            <div>
                <h1>About SPNSRD</h1>
                <br>
                <p>SPNSRD is a project that started as an idea for a school assignment. It is in early stages and may be frequently updated.</p>
            </div>
        </div>
    </body>
</html>