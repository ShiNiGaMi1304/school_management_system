<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Teachers</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" style="text-decoration: none; color: white; background-color: #3498db; padding: 10px 20px; border-radius: 5px; display: inline-block;">
        🔙 Back to Home
    </a>
</div>

    <h2>Teachers List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Salary</th>
            <th>Background Check</th>
        </tr>

        <?php
        $stmt = $conn->query("SELECT * FROM teachers");
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phoneNumber'] . "</td>";
            echo "<td>" . $row['salary'] . "</td>";
            echo "<td>" . ($row['backgroundCheck'] ? "Yes" : "No") . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
