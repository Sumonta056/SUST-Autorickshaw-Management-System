<?php
$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
} 

$sql = "SELECT * FROM autorickshaw";
$result = mysqli_query($mysqli, $sql);

$num = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>অটোরিকশার তালিকা</title>
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
        <h1>অটোরিকশার তালিকা</h1>

        <?php
        if ($num > 0) {
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>অটোরিকশা নং</th>';
            echo '<th>মডেল</th>';
            echo '<th>কোম্পানি</th>';
            echo '<th>রং</th>';
            echo '<th>মালিকের নাম</th>';
            echo '<th>ড্রাইভারের নাম</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['autorickshaw_number'] . '</td>';
                echo '<td>' . $row['autorickshaw_model'] . '</td>';
                echo '<td>' . $row['autorickshaw_company'] . '</td>';
                echo '<td>' . $row['autorickshaw_color'] . '</td>';
                echo '<td>';
                
                // Query to retrieve owner name using owner_nid
                $ownerNid = $row['owner_nid'];
                $ownerQuery = "SELECT owner_name FROM owner WHERE owner_nid = '$ownerNid'";
                $ownerResult = mysqli_query($mysqli, $ownerQuery);
                $ownerRow = mysqli_fetch_assoc($ownerResult);
                
                if ($ownerRow) {
                    echo $ownerRow['owner_name'];
                } 
                
                echo '</td>';
                echo '<td>';
                
                // Query to retrieve driver name using driver_nid
                $driverAutoNo = $row['autorickshaw_number'];
                $driverQuery = "SELECT driver_name FROM driver WHERE autorickshaw_number = '$driverAutoNo'";
                $driverResult = mysqli_query($mysqli, $driverQuery);
                $driverRow = mysqli_fetch_assoc($driverResult);
                
                if ($driverRow) {
                    echo $driverRow['driver_name'];
                } 
                
                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>কোনো অটোরিকশা যুক্ত করা হয় নি।</p>';
        }
        ?>

    </div>
</body>
</html>
