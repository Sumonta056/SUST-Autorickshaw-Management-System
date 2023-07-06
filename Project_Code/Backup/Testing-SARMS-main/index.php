<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>SUST Auto-Rickshaw</title>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        * {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
}

.wrapper {
    width: 1170px;
    margin: auto;
}

header {
    background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(images/mainbg2.jpg);
    height: 100vh;
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center center;
    position: relative;
}

.nav-area {
    float: right;
    list-style: none;
    margin-top: 30px;
}

.nav-area li {
    display: inline-block;
}

.nav-area li a {
    color: #fff;
    text-decoration: none;
    padding: 5px 20px;
    font-family: poppins;
    font-size: 16px;
    text-transform: uppercase;
}

.nav-area li a:hover {
    background: #fff;
    color: #333;
}

.logo {
    float: left;
}

.logo img {
    width: 50px;
    padding: 15px 0;
}

.welcome-text {
    position: absolute;
    width: 100%;
    height: 300px;
    top:37%;
    text-align: center;
}

.welcome-tex {
    position: absolute;
    width: 100%;
    height: 300px;
    top: 13%;
    text-align: center;
}


.welcome-text h1 {
    text-align: center;
    color: #fff;
    text-transform: uppercase;
    font-size: 75px;
}

.welcome-text h1 span {
    color: #e0cdb4;
}

h3 {
    text-align: center;
    color: #fff;
    text-transform: uppercase;
    font-size: 30px;
   
}

 h3 span {
    color: #a8db65;
}

.welcome-text h2 {
    text-align: center;
    color: #fff;
    text-transform: uppercase;
    font-size: 45px;
}

.welcome-text h2 span {
    color: #00fecb;
}

.welcome-text a {
    border: 1px solid #fff;
    padding: 10px 25px;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 18px;
    margin-top: 20px;
    margin-left: 10px;
    margin-right: 10px;
    display: inline-block;
    color: #fff;
}

.welcome-text .logout {
    border: 1px solid #fff;
    padding: 10px 25px;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 18px;
    margin-top: 20px;
    margin-left: 10px;
    margin-right: 10px;
    display: inline-block;
    color: #ec6868;
}
.welcome-text .logout:hover {
    background: #fff;
    color: #dd1313;
}


.welcome-text a:hover {
    background: #fff;
    color: #333;
}

/*resposive*/

@media (max-width:600px) {
    .wrapper {
        width: 100%;
    }

    .logo {
        float: none;
        width: 50%;
        text-align: center;
        margin: auto;
    }

    img {
        width: 50%;
    }

    .nav-area {
        float: none;
        margin-top: 0;
    }

    .nav-area li a {
        padding: 5px;
        font-size: 11px;
    }

    .nav-area {
        text-align: center;
    }

    .welcome-text {
        width: 100%;
        height: auto;
        margin: 30% 0;
    }

    .welcome-text h1 {
        font-size: 30px;
    }
}
</style>
</head>

<body>

    <header>

        <div class="wrapper">
            <div class="logo">
                <img src="images/logo.png" alt="">

            </div>
            <ul class="nav-area">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Search</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        <div class=" welcome-tex">

            <?php if (isset($user)): ?>

                <h3>Welcome <span class="name">
                <?= htmlspecialchars($user["name"]) ?> ! </span>
                </h3>

                <?php endif; ?>

        </div>

    


        <div class="welcome-text">
                    <h1>
                        <span>SUST</span>
                    </h1>
                    <h2>
                        <span>Auto-Rickshaw</span> Management <span>System</span>
                    </h2>

                    <?php if (isset($user)): ?>


                        <a href="process-owner-registration.php">Owner Registration</a>
                        <a href="process-autorickshaw-registration.php">Auto-Rickshaw Registration</a>
                        <a href="process-driver-registration.php">Driver Registration</a>
                        <a href="process-manager-registration.php">Manager Registration</a>
                        <a href="process-authority-registration.php">Authority Registration</a>
                        <a class="logout" href="logout.php">Log out</a>

                    <?php else: ?>

                        <a href="process-signup.php">Log in</a>
                        <a href="process-signup.php">sign up</a>

                    <?php endif; ?>


        </div>

    </header>



</body>

</html>