<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Class</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" style="text-decoration: none; color: white; background-color: #3498db; padding: 10px 20px; border-radius: 5px; display: inline-block;">
        🔙 Back to Home
    </a>
</div>

    <h2>Add Class</h2>
    <form method="POST" action="">
        <label>Class Name:</label>
        <input type="text" name="className" required><br>

        <label>Capacity:</label>
        <input type="number" name="capacity" required><br>

        <label>Teacher ID:</label>
        <input type="number" name="teacherId" required><br>

        <input type="submit" name="submit" value="Add Class">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $className = $_POST['className'];
        $capacity = $_POST['capacity'];
        $teacherId = $_POST['teacherId'];

        $sql = "INSERT INTO classes (className, capacity, teacherId) 
                VALUES ('$className', $capacity, $teacherId)";
        $conn->exec($sql);
        echo "Class added successfully!";
    }
    ?>
</body>
</html>
