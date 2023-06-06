<?php

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


?>