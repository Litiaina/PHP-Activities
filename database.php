<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$database = "elphp_zambo";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO menu_table (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $description);

    if ($stmt->execute()) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt . "<br>" . $conn->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();

header("Location: addMenu.php");
exit;
?>
