<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$database = "elphp_zambo";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menuName = $_POST['name'];
    $menuDescription = $_POST['description'];

    // Insert operation
    if (isset($_POST['insert'])) {
        $sql = "INSERT INTO menu_table (menu_name, menu_description) VALUES ('$menuName', '$menuDescription')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New record created successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
    }


    // Delete operation
    if (isset($_POST['delete'])) {
        echo '<script language="javascript">';
        echo 'var r = confirm("Are you sure you want to delete this record?");';
        echo 'if (r == true) {';
        echo '  window.location.href = "database.php?delete=' . urlencode($_POST['name']) . '";';
        echo '} else {';
        echo '  alert("Deletion canceled");';
        echo '}';
        echo '</script>';
    }

    // Modify operation
    if (isset($_POST['update'])) {
        $menuToUpdate = $_POST['name'];
        $newDescription = $_POST['description'];

        $update_sql = "UPDATE menu_table SET menu_description='$newDescription' WHERE menu_name='$menuToUpdate'";

        if ($conn->query($update_sql) === TRUE) {
            echo "<script>alert('Record updated successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $update_sql . "<br>" . $conn->error . "');</script>";
        }
    }
}

// Perform the delete operation if confirmed
if (isset($_GET['delete'])) {
    $menuToDelete = urldecode($_GET['delete']);

    $delete_sql = "DELETE FROM menu_table WHERE menu_name='$menuToDelete'";

    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $delete_sql . "<br>" . $conn->error . "');</script>";
    }
}

// Close the connection
$conn->close();

echo '<script>window.location.href = "addMenu.php";</script>';
?>