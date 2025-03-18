<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Assistant Teachers</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" class="back-button">🔙 Back to Home</a>
</div>

<h2>Assistant Teachers List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Assigned Class ID</th>
    </tr>

    <?php
    $stmt = $conn->query("SELECT * FROM teaching_assistants");
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['firstName'] . "</td>";
        echo "<td>" . $row['lastName'] . "</td>";
        echo "<td>" . $row['assignedClassId'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
