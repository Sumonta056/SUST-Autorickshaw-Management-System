<?php

if (empty($_POST["driver_nid"])) {
    die(" Driver Nid Required !!");
}

if (strlen($_POST["driver_nid"]) < 10) {
    die("Wrong Driver Nid ( Less than 10 characters) !!");
}

if (empty($_POST["driver_name"])) {
    die(" Driver Name Required !!");
}

if (empty($_POST["driver_date_of_birth"])) {
    die(" Driver Date of Birth Required !!");
}

if (empty($_POST["driver_houseNo"])) {
    die(" Driver House No Required !!");
}
if (empty($_POST["driver_postalCode"])) {
    die(" Driver Postal Code Required !!");
}

if (empty($_POST["driver_address"])) {
    die(" Driver Address Required !!");
}

if (empty($_POST["autorickshaw_number"])) {
    die(" Auto-Rickshaw Number Required !!");
}

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO driver (driver_nid, driver_name,  driver_date_of_birth,  driver_houseNo , 
                                driver_postalCode ,driver_address,autorickshaw_number)
        VALUES (?, ?, ? ,?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssssssi",
    $_POST["driver_nid"],
    $_POST["driver_name"],
    $_POST["driver_date_of_birth"],
    $_POST["driver_houseNo"],
    $_POST["driver_postalCode"],
    $_POST["driver_address"],
    $_POST["autorickshaw_number"]
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


?>