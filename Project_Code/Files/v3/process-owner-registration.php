<?php


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

    header("Location: signup-success.php");
    exit;

} else {

    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}


?>