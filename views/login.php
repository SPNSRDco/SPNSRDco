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
            padding: 10px;
            border-bottom: 1px solid #ddd;
            margin: auto;
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
            height: 10vh;
            padding-top: 3vh;
            padding-bottom: 3vh;
            align-items: center;
            justify-content: center;
            border-radius: 25px;
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
    <div id="header">
        <a id="logo" href="index.php">
            <img id="logo" src="web/logo" alt="SPNSRD Logo">
        </a>
    </div>
    <br>
    <div class="center" id="login">
        <form action="login.php" method="post">
            <input class="center" type="text" name="username" placeholder="Username" required>
            <br>
            <input class="center" type="password" name="password" placeholder="Password" required>
            <br>
            <input class="center" type="submit" value="Login">
        </form>
    </div>
    <br>
    <a href="register.php">Register</a>
</body>
</html>