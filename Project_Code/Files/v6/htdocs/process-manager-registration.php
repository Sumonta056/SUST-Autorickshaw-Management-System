<?php

if (empty($_POST["manager_nid"])) {
    die(" Manager Nid Required !!");
}

if (strlen($_POST["manager_nid"]) < 10) {
    die("Wrong Manager Nid ( Less than 10 characters) !!");
}

if (empty($_POST["manager_name"])) {
    die(" Manager Name Required !!");
}

if (empty($_POST["manager_date_of_birth"])) {
    die(" Manager Date of Birth Required !!");
}

if (empty($_POST["manager_houseNo"])) {
    die(" Manager House No Required !!");
}
if (empty($_POST["manager_postalCode"])) {
    die(" Manager Postal Code Required !!");
}

if (empty($_POST["manager_address"])) {
    die(" Manager Address Required !!");
}



$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO manager (manager_nid, manager_name,  manager_date_of_birth,  manager_houseNo , manager_postalCode ,manager_address)
        VALUES (?, ?, ? ,?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssssss",
    $_POST["manager_nid"],
    $_POST["manager_name"],
    $_POST["manager_date_of_birth"],
    $_POST["manager_houseNo"],
    $_POST["manager_postalCode"],
    $_POST["manager_address"]
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