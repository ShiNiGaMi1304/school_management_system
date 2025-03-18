<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Parents</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" class="back-button">🔙 Back to Home</a>
</div>

<h2>Parents List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone Number</th>
    </tr>

    <?php
    $stmt = $conn->query("SELECT * FROM parents_guardians");
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phoneNumber'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
