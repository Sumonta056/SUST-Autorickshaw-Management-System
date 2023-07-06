<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ownerstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>মালিক নিবন্ধন ফর্ম</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap');

* {
    font-family: 'Poppins', sans-serif;
}

.wrapper {
    background:#b4beb2;
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
    background-image: url("images/2.jpg");
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
    background: #ececec;
    border-radius: 5px;
    transition: .4s;
    background: rgba(110, 156, 37, 0.9);
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

if (empty($_POST["owner_nid"])) {
    die(" Owner Nid Required !!");
}

if (strlen($_POST["owner_nid"]) < 10) {
    die("Wrong Owner Nid ( Less than 10 characters) !!");
}

if (empty($_POST["owner_name"])) {
    die(" Owner Name Required !!");
}

if (empty($_POST["owner_date_of_birth"])) {
    die(" Owner Date of Birth Required !!");
}

if (empty($_POST["owner_houseNo"])) {
    die(" Owner House No Required !!");
}
if (empty($_POST["owner_postalCode"])) {
    die(" Owner Postal Code Required !!");
}

if (empty($_POST["owner_address"])) {
    die(" Owner Address Required !!");
}

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO owner (owner_nid, owner_name,  owner_date_of_birth,  owner_houseNo , owner_postalCode ,owner_address)
        VALUES (?, ?, ? ,?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssssss",
    $_POST["owner_nid"],
    $_POST["owner_name"],
    $_POST["owner_date_of_birth"],
    $_POST["owner_houseNo"],
    $_POST["owner_postalCode"],
    $_POST["owner_address"]
);

if ($stmt->execute()) {

    header("Location: index.php");
    exit;

} else {

    if ($mysqli->errno === 1062) {
        die("Error: একই এনআইডিধারী ব্যক্তি একাধিকবার রেজিস্ট্রেশন করতে পারবে না।
        ");
    } else {
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
                        <header>মালিক নিবন্ধন ফর্ম</header>

                        <form action="process-owner-registration.php" method="post" id="owner_registration" novalidate>

                            <div class="input-field">
                                <input type="text" class="input" id="owner_nid" name = "owner_nid" required>
                                <label>জাতীয় পরিচয়পত্র নম্বর</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="owner_name" name = "owner_name" required>
                                <label for="owner_name">মালিকের নাম</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="owner_date_of_birth" name = "owner_date_of_birth" pattern="\d{4}-\d{2}-\d{2}" required>
                                <label for="owner_date_of_birth">জন্ম তারিখ (YYYY-MM-DD)</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" name = "owner_houseNo" id="owner_houseNo" required>
                                <label for="owner_houseNo">বর্তমান ঠিকানা : বাড়ি নং</label>
                            </div>

                            <div class="input-field">
                                <input type="text" class="input" id="owner_postalCode" name = "owner_postalCode" required>
                                <label for="owner_postalCode">বর্তমান ঠিকানা : পোস্টাল কোড
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" id="owner_address" name = "owner_address" required>
                                <label for="owner_address">বর্তমান ঠিকানা :জেলা</label>
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