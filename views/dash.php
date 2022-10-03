<?php
    session_start();
    $APIkey = "AIzaSyDMC36lGNcf0RfIGYpqtdYxDZOufdPD0XE";
    $db = new SQLite3('../user.db'); // Connect to database
    $db->busyTimeout(1000);
    $query = $db->prepare("SELECT UserID FROM users WHERE SessionID=?");
    $query->bindValue(1, session_id());
    $result = $query->execute();
    $result = $result->fetchArray();
    $notLoggedin = $result == null;
    if ($result == null) {
        header("Location: login.php");
        echo "not logged in";
        return;
    }
    $db->close();
    unset($db);
    $db = new SQLite3('../user.db'); // Connect to database
    $db->busyTimeout(1000);
    $query = $db->prepare("SELECT ChannelID FROM users WHERE SessionID=?");
    $query->bindValue(1, session_id());
    $result = $query->execute();
    $result = $result->fetchArray()[0];
    $db->close();
    unset($db);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dash - SPNSRD</title>
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
            #profile {
                width: 50vw;
                background-color: #fff;
                padding: 1vw;
                height: fit-content;
                padding-top: 3vh;
                padding-bottom: 3vh;
                align-items: center;
                align-content: center;
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
            #aboutsection{
                width: fit-content;
                margin: auto;
                align-items: center;
            }
            #pfp {
                width: 10vw;
                height: 10vw;
                border-radius: 50%;
                margin: auto;
                margin-bottom: 1vh;
            }
            input {
                margin: 1vw;
                display: flex;
            }
            form {
                width: fit-content;
                margin: auto;
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
        <div class="center" id="profile">
            <div id="aboutsection">
                <?php
                if (!$notLoggedin) {
                    $url = "https://www.googleapis.com/youtube/v3/channels?part=snippet&fields=items%2Fsnippet%2Fthumbnails%2Fdefault&id=". $result . "&key=AIzaSyDMC36lGNcf0RfIGYpqtdYxDZOufdPD0XE";
                    echo "<img id=\"pfp\" alt=\"Profile Picture\"><script>
\nvar xhr = new XMLHttpRequest();
\nxhr.open('GET', '".$url."', true);
\nxhr.responseType = 'json';
\nxhr.onload = function() {
    \ndocument.getElementById(\"pfp\").src = xhr.response.items[0].snippet.thumbnails.default.url
\n}
\nxhr.send()</script><br>";
                    echo "<a href='https://www.youtube.com/channel/".$result."'><h3>" . $_SESSION["name"] . "</h3></a>";
                }
                ?>
            </div>
            <div id="stats">
                <h3>Stats</h3>
                <p>Subscribers: <?php
                $api_response = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$result.'&fields=items/statistics/subscriberCount&key='.$APIkey);
                $api_response_decoded = json_decode($api_response, true);
                echo $api_response_decoded['items'][0]['statistics']['subscriberCount'];?></p>
            </div>
            <br>
            <br>
            <br>
            <form action="changeID.php" method="post">
                <input type="text" name="newID" placeholder="Channel ID">
                <input type="submit" value="Change Username">
            </form>
            <br>
            Hello <?php echo $_SESSION['name']; ?>!
            <br>
            <a href="logout.php">Logout</a>
            <a href="terminate.php">Delete Account</a>
    </body>
</html>