<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Salaries</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" class="back-button">🔙 Back to Home</a>
</div>

<h2>Salaries List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Teacher ID</th>
        <th>Amount</th>
        <th>Pay Date</th>
    </tr>

    <?php
    $stmt = $conn->query("SELECT * FROM salaries");
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['teacherId'] . "</td>";
        echo "<td>" . $row['amount'] . "</td>";
        echo "<td>" . $row['payDate'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
