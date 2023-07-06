<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="autorickshawReg.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>অটোরিকশা নিবন্ধন ফর্ম</title>
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

if (empty($_POST["autorickshaw_number"])) {
    echo" Auto-Rickshaw Number Required !!";
}

if (empty($_POST["autorickshaw_model"])) {
    echo" Auto-Rickshaw Model Required !!";
}

if (empty($_POST["autorickshaw_color"])) {
    echo" Auto-Rickshaw Color Required !!";
}

if (empty($_POST["owner_nid"])) {
    echo" Owner Nid Required !!";
}

if (strlen($_POST["owner_nid"]) < 10) {
    die("Wrong Owner Nid ( Less than 10 characters) !!");
}

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO autorickshaw ( autorickshaw_number, autorickshaw_company,  autorickshaw_model,  autorickshaw_color , owner_nid)
        VALUES (?, ?, ? ,?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "issss",
    $_POST["autorickshaw_number"],
    $_POST["autorickshaw_company"],
    $_POST["autorickshaw_model"],
    $_POST["autorickshaw_color"],
    $_POST["owner_nid"]
);

if ($stmt->execute()) {

    header("Location: index.php");
    exit;

} else {

    if ($mysqli->errno === 1062) {
        die("উক্ত অটোরিকশা পূর্বে রেজিস্ট্রেশন করা হয়েছে।");
    } else if ($mysqli->errno === 1452) {
        die("উক্ত মালিকের নাম নিবন্ধন করা হয় নি");
    } 
    else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
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
                        <header>অটোরিকশা নিবন্ধন ফর্ম</header>

                        <form action="process-autorickshaw-registration.php" method="post" id="autorickshaw-registration" novalidate>

                            <div class="input-field">
                                <input type="text" class="input" id="autorickshaw_number" name = "autorickshaw_number" required>
                                <label for="autorickshaw_number">অটোরিকশা নং
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="autorickshaw_company" name = "autorickshaw_company" required>
                                <label for="autorickshaw_company">কোম্পানি নাম
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="autorickshaw_model" name = "autorickshaw_model" required>
                                <label for="autorickshaw_model">মডেল নং
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" name = "autorickshaw_color" id="autorickshaw_color" required>
                                <label for="autorickshaw_color">অটোরিকশার রং
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="owner_nid" name = "owner_nid" required>
                                <label for="owner_nid">মালিকের জাতীয় পরিচয়পত্র নম্বর
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="নিবন্ধন">

                            </div>

                        </form>

                        <div class="signin">
                            <span>পূর্বে রেজিস্ট্রেশন করেছেন? <a href="#">এড়িয়ে যান</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>