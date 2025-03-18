<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Classes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" style="text-decoration: none; color: white; background-color: #3498db; padding: 10px 20px; border-radius: 5px; display: inline-block;">
        🔙 Back to Home
    </a>
</div>

    <h2>Class List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Class Name</th>
            <th>Capacity</th>
            <th>Teacher ID</th>
        </tr>

        <?php
        $stmt = $conn->query("SELECT * FROM classes");
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['className'] . "</td>";
            echo "<td>" . $row['capacity'] . "</td>";
            echo "<td>" . $row['teacherId'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
