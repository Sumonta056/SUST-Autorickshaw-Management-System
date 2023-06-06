<?php

if (empty($_POST["authority_nid"])) {
    die(" Manager Nid Required !!");
}

if (strlen($_POST["authority_nid"]) < 10) {
    die("Wrong Manager Nid ( Less than 10 characters) !!");
}

if (empty($_POST["authority_name"])) {
    die(" Manager Name Required !!");
}

if (empty($_POST["authority_job_title"])) {
    die(" Manager Date of Birth Required !!");
}

if (empty($_POST["authority_signature"])) {
    die(" Manager House No Required !!");
}


$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO authority (authority_nid, authority_name,  authority_job_title,  authority_signature)
        VALUES (?, ?, ? ,?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssss",
    $_POST["authority_nid"],
    $_POST["authority_name"],
    $_POST["authority_job_title"],
    $_POST["authority_signature"],
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