<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Parent</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div style="text-align: center; margin: 15px;">
    <a href="index.php" class="back-button">🔙 Back to Home</a>
</div>

<h2>Add Parent</h2>
<form method="POST" action="">
    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Address:</label>
    <input type="text" name="address" required><br>

    <label>Email:</label>
    <input type="email" name="email"><br>

    <label>Phone Number:</label>
    <input type="text" name="phoneNumber" required><br>

    <input type="submit" name="submit" value="Add Parent">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    try {
        $sql = "INSERT INTO parents_guardians (name, address, email, phoneNumber) 
                VALUES ('$name', '$address', '$email', '$phoneNumber')";
        $conn->exec($sql);
        echo "<p style='color: green;'>Parent added successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
</body>
</html>
