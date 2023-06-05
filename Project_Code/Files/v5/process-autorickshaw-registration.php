<?php


if (empty($_POST["autorickshaw_number"])) {
    die(" Auto-Rickshaw Number Required !!");
}

if (empty($_POST["autorickshaw_model"])) {
    die(" Auto-Rickshaw Model Required !!");
}

if (empty($_POST["autorickshaw_color"])) {
    die(" Auto-Rickshaw Color Required !!");
}

if (empty($_POST["owner_nid"])) {
    die(" Owner Nid Required !!");
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
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}


?>