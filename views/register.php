<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - SPNSRD</title>
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
            #login {
                width: 15vw;
                background-color: #fff;
                padding: 1vw;
                height: 14vh;
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
            #passwordnote {
                width: 15vw;
                background-color: #fff;
                padding: 1vw;
                align-items: center;
                border-radius: 25px;
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
            <a class="navopts" href="Account.php">Account</a>
            <a class="navopts" href="Search.php">Search</a>
        </div>
        <br>
        <div class="center" id="login">
        <form action="registerHandler.php" method="post">
                <input class="center" type="email" name="email" placeholder="Email" required>
                <br>
                <input class="center" type="text" name="username" placeholder="Username" required>
                <br>
                <input class="center" type="password" name="password" placeholder="Password" required>
                <br>
                <input class="center" type="submit" value="Register">
            </form>
        </div>
        <br>
        <div class="center" id="passwordnote">
            <p>For security reasons, passwords must meet the following requirements:
            <br>
            <ul>
                <li>Must be at least 8 characters long</li>
                <li>Must contain at least one letter</li>
                <li>Must contain at least one number</li>
            </ul>
            </p>
        </div>
        <br>
        <a href="login.php">login</a>
    </body>
</html>