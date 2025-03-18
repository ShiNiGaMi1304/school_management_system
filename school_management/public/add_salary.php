<?php
// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Salary</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" class="back-button">🔙 Back to Home</a>
</div>

<h2>Add Salary</h2>
<form method="POST" action="">
    <label>Teacher:</label>
    <select name="teacherId" required>
        <option value="">Select Teacher</option>
        <?php
        $stmt = $conn->query("SELECT id, name FROM teachers");
        while ($row = $stmt->fetch()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . " (ID: " . $row['id'] . ")</option>";
        }
        ?>
    </select><br>

    <label>Amount:</label>
    <input type="number" name="amount" required><br>

    <label>Pay Date:</label>
    <input type="date" name="payDate" required><br>

    <input type="submit" name="submit" value="Add Salary">
</form>

<?php
if (isset($_POST['submit'])) {
    $teacherId = $_POST['teacherId'];
    $amount = $_POST['amount'];
    $payDate = $_POST['payDate'];

    try {
        $sql = "INSERT INTO salaries (teacherId, amount, payDate) 
                VALUES ($teacherId, $amount, '$payDate')";
        $conn->exec($sql);
        echo "<p style='color: green;'>Salary added successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
</body>
</html>
