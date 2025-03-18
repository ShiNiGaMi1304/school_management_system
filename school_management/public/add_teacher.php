<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" style="text-decoration: none; color: white; background-color: #3498db; padding: 10px 20px; border-radius: 5px; display: inline-block;">
        🔙 Back to Home
    </a>
</div>

<h2>Add Teacher</h2>
<form method="POST" action="">
    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Address:</label>
    <input type="text" name="address" required><br>

    <label>Phone Number:</label>
    <input type="text" name="phoneNumber" required><br>

    <label>Salary:</label>
    <input type="number" name="salary" required><br>

    <label>Background Check:</label>
    <input type="checkbox" name="backgroundCheck" value="1"><br>

    <label>Class ID:</label>
    <select name="classId" required>
        <option value="">Select Class</option>
        <?php
        $stmt = $conn->query("SELECT id, className FROM classes");
        while ($row = $stmt->fetch()) {
            echo "<option value='" . $row['id'] . "'>" . $row['className'] . " (ID: " . $row['id'] . ")</option>";
        }
        ?>
    </select><br>

    <input type="submit" name="submit" value="Add Teacher">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $salary = $_POST['salary'];
    $backgroundCheck = isset($_POST['backgroundCheck']) ? 1 : 0;
    $classId = !empty($_POST['classId']) ? $_POST['classId'] : 'NULL';

    try {
        $sql = "INSERT INTO teachers (name, address, phoneNumber, salary, backgroundCheck, classId) 
                VALUES ('$name', '$address', '$phoneNumber', $salary, $backgroundCheck, $classId)";
        $conn->exec($sql);
        echo "<p style='color: green;'>Teacher added successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
</body>
</html>
