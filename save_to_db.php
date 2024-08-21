<?php
// Retrieve form data
$website = $_POST['website'];
$username = $_POST['username'];
$password = $_POST['password'];
$md5Hash = $_POST['md5Hash']; 


$mysqli = new mysqli('localhost', 'root', '', 'passvault');

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}


$sql = "INSERT INTO hashvalue (website, username, password, md5Hash) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die('Prepare failed: ' . $mysqli->error);
}

if (!$stmt->bind_param('ssss', $website, $username, $password, $md5Hash)) {
    die('Binding parameters failed: ' . $stmt->error);
}


if ($stmt->execute()) {
    echo 'Data inserted successfully.';
} else {
    echo 'Error: ' . $mysqli->error;
}


$stmt->close();
$mysqli->close();
?>
