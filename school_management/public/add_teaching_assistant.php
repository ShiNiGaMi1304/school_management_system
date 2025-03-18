<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Assistant Teacher</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" class="back-button">🔙 Back to Home</a>
</div>

<h2>Add Assistant Teacher</h2>
<form method="POST" action="">
    <label>First Name:</label>
    <input type="text" name="firstName" required><br>

    <label>Last Name:</label>
    <input type="text" name="lastName" required><br>

    <label>Assigned Class:</label>
    <select name="assignedClassId" required>
        <option value="">Select Class</option>
        <?php
        $stmt = $conn->query("SELECT id, className FROM classes");
        while ($row = $stmt->fetch()) {
            echo "<option value='" . $row['id'] . "'>" . $row['className'] . " (ID: " . $row['id'] . ")</option>";
        }
        ?>
    </select><br>

    <input type="submit" name="submit" value="Add Assistant Teacher">
</form>

<?php
if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $assignedClassId = $_POST['assignedClassId'];

    try {
        $sql = "INSERT INTO teaching_assistants (firstName, lastName, assignedClassId) 
                VALUES ('$firstName', '$lastName', $assignedClassId)";
        $conn->exec($sql);
        echo "<p style='color: green;'>Assistant Teacher added successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
</body>
</html>
