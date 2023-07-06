<?php
$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
} 

$sql = "SELECT * FROM owner";
$result = mysqli_query($mysqli, $sql);

$num = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>মালিকের তালিকা</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            user-select: none;
        }

        .container {
            max-width: fit-content;
            margin: 0 auto;
            margin-top: 30px;
            margin-left: 20px;
            margin-right: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            text-align: center;
            color: #333;
            font-size: 28px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word;
        }

        th {
            background-color: #f5f5f5;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #fce8d5;
        }

        p {
            text-align: center;
            font-size: 18px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>মালিকের তালিকা</h1>

        <?php
        if ($num > 0) {
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>এনআইডি নং</th>';
            echo '<th>নাম</th>';
            echo '<th>ঠিকানা</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['owner_nid'] . '</td>';
                echo '<td>' . $row['owner_name'] . '</td>';
                echo '<td>' . $row['owner_address'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>কোনো মালিক যুক্ত করা হয় নি।</p>';
        }
        ?>

    </div>
    </body>
    </html>
