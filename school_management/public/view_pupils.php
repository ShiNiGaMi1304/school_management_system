<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Pupils</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" style="text-decoration: none; color: white; background-color: #3498db; padding: 10px 20px; border-radius: 5px; display: inline-block;">
        🔙 Back to Home
    </a>
</div>

    <h2>Pupil List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Medical Info</th>
            <th>Class ID</th>
            <th>Parent 1 ID</th>
            <th>Parent 2 ID</th>
        </tr>

        <?php
        $stmt = $conn->query("SELECT * FROM pupils");
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['medicalInfo'] . "</td>";
            echo "<td>" . $row['classId'] . "</td>";
            echo "<td>" . $row['parent1Id'] . "</td>";
            echo "<td>" . $row['parent2Id'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
