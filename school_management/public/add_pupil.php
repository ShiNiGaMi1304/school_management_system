<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Pupil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" style="text-decoration: none; color: white; background-color: #3498db; padding: 10px 20px; border-radius: 5px; display: inline-block;">
        🔙 Back to Home
    </a>
</div>

<h2>Add Pupil</h2>
<form method="POST" action="">
    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Address:</label>
    <input type="text" name="address" required><br>

    <label>Medical Info:</label>
    <input type="text" name="medicalInfo"><br>

    <label>Class:</label>
    <select name="classId" required>
        <option value="">Select Class</option>
        <?php
        $stmt = $conn->query("SELECT id, className FROM classes");
        while ($row = $stmt->fetch()) {
            echo "<option value='" . $row['id'] . "'>" . $row['className'] . " (ID: " . $row['id'] . ")</option>";
        }
        ?>
    </select><br>

    <label>Parent 1:</label>
    <select name="parent1Id">
        <option value="">Select Parent</option>
        <?php
        $stmt = $conn->query("SELECT id, name FROM parents_guardians");
        while ($row = $stmt->fetch()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . " (ID: " . $row['id'] . ")</option>";
        }
        ?>
    </select><br>

    <label>Parent 2:</label>
    <select name="parent2Id">
        <option value="">Select Parent</option>
        <?php
        $stmt = $conn->query("SELECT id, name FROM parents_guardians");
        while ($row = $stmt->fetch()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . " (ID: " . $row['id'] . ")</option>";
        }
        ?>
    </select><br>

    <input type="submit" name="submit" value="Add Pupil">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $medicalInfo = $_POST['medicalInfo'];
    $classId = !empty($_POST['classId']) ? $_POST['classId'] : 'NULL';
    $parent1Id = !empty($_POST['parent1Id']) ? $_POST['parent1Id'] : 'NULL';
    $parent2Id = !empty($_POST['parent2Id']) ? $_POST['parent2Id'] : 'NULL';

    try {
        $sql = "INSERT INTO pupils (name, address, medicalInfo, classId, parent1Id, parent2Id) 
                VALUES ('$name', '$address', '$medicalInfo', $classId, $parent1Id, $parent2Id)";
        $conn->exec($sql);
        echo "<p style='color: green;'>Pupil added successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
</body>
</html>
