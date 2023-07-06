<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>রাউন্ড ফর্ম</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap');

* {
    font-family: 'Poppins', sans-serif;
}

.wrapper {
    background:#7d8a7a;
    padding: 0 20px 0 20px;
}

.main {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.row {
    width: 900px;
    height: 600px;
    border-radius: 10px;
    background: #fff;
    box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2);
}

.side-image {
    background-image: url("images/mainbg2.jpg");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    border-radius: 10px 0 0 10px;
}


img {
    width: 35px;
    position: absolute;
    top: 30px;
    left: 30px;
}

.right {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

.input-box {
    width: 330px;
    box-sizing: border-box;
}

.input-box header {
    font-weight: 700;
    text-align: center;
    margin-bottom: 32px;
    font-size: 27px;
    margin-top: 10px;
}

.input-field {
    display: flex;
    flex-direction: column;
    position: relative;
    padding: 0 10px 0 10px;
    
}

.input {
    height: 35px;
    width: 100%;
    background: transparent;
    border: none;
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    
    outline: none;
    margin-top: 5px;
    margin-bottom: 20px;
    color: #40414a;
}

.input-box .input-field label {
    position: absolute;
    top: 10px;
    font-size: 15px;
    font-weight: 500;
    left: 10px;
    pointer-events: none;
    transition: .5s;
    color: #797676f1;
}

.input-field .input:focus~label {
    top: -10px;
    font-size: 13px;
}

.input-field .input:valid~label {
    top: -10px;
    font-size: 13px;
    color: #5d5076;
}

.input-field .input:focus,
.input-field .input:valid {
    border-bottom: 1px solid #743ae1;
}

.submit {
    border: none;
    outline: none;
    height: 45px;
    background: #f0e7e7;
    color: #f0e7e7;
    border-radius: 5px;
    transition: .4s;
    background: rgba(54, 56, 51, 0.9);
    font-weight: 500;
   
}

.submit:hover {
    background: rgba(37, 95, 156, 0.9);
    color: #fff;
}

.signin {
    text-align: center;
    font-size: 12px;
    margin-top: 15px;
    margin-bottom: 20px;
}

span a {
    text-decoration: none;
    font-weight: 700;
    color: #000;
    transition: .5s;
}

span a:hover {
    text-decoration: underline;
    color: #000;
}

@media only screen and (max-width: 768px) {
    .side-image {
        border-radius: 10px 10px 0 0;
    }

    img {
        width: 35px;
        position: absolute;
        top: 20px;
        left: 47%;
    }

    .text {
        position: absolute;
        top: 70%;
        text-align: center;
    }

    .text p,
    i {
        font-size: 17px;
    }

    .row {
        max-width: 420px;
        width: 100%;
    }
}
</style>
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["manager_nid"])) {
        die("Manager NID Required!");
    }

    if (empty($_POST["round_number"])) {
        die("Round Number Required!");
    }

    if (empty($_POST["round_start_time"])) {
        die("Round Start Time Required!");
    }

    if (empty($_POST["round_end_time"])) {
        die("Round End Time Required!");
    }

    if (empty($_POST["round_date"])) {
        die("Round Date Required!");
    }

    if (empty($_POST["round_area"])) {
        die("Round Area Required!");
    }

    // Database connection
    $host = "localhost";
    $dbname = "login_db";
    $username = "root";
    $password = "";
    
    $mysqli = new mysqli($host, $username, $password, $dbname);
    
    if ($mysqli->connect_errno) {
        die("Connection error: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO round (round_number, round_date, round_start_time, round_end_time, round_area, manager_nid) VALUES (?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $mysqli->error);
    }

    $stmt->bind_param("ssssss", $_POST["round_number"], $_POST["round_date"], $_POST["round_start_time"], $_POST["round_end_time"], $_POST["round_area"], $_POST["manager_nid"]);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        if ($mysqli->errno === 1452) {
            echo "ম্যানেজারের এনআইডি সঠিক নয়।";
        } else if ($mysqli->errno === 1062) {
            die("Error: রাউন্ড নং পুনরাবৃত্তি হয়েছে।");
        } else {
            die("Error: " . $mysqli->error);
        }
    }

    $stmt->close();
    $mysqli->close();
}

?>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-------Image-------->
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <header>রাউন্ড ফর্ম</header>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="round_adding" novalidate>

                            <div class="input-field">
                                <input type="text" class="input" id="round_number" name = "round_number" required>
                                <label>রাউন্ড নং</label> 
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="round_date" name="round_date" required>
                                <label for="round_date">রাউন্ড তারিখ</label>
                            </div>
                            
                            <div class="input-field">
                                <input type="text" class="input" id="round_start_time" name = "round_start_time" required>
                                <label for="round_start_time">রাউন্ড শুরুর সময় </label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" name = "round_end_time" id="round_end_time" required>
                                <label for="round_end_time">রাউন্ড শেষের সময় </label>
                            </div>

                            <div class="input-field">
                                <input type="text" class="input" id="round_area" name = "round_area" required>
                                <label for="round_area">রাউন্ড স্থান 
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="manager_nid" name = "manager_nid" required>
                                <label for="manager_nid">ম্যানেজারের এনআইডি নং</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="নিবন্ধন">

                            </div>

                        </form>

                        <div class="signin">
                            <span><a href="#">পূর্বের মেনুতে ফিরে যান</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="input.js"></script>

</html>
