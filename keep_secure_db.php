<?php
$conn = mysqli_connect("localhost", "root", "", "passvault");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$website = $_POST['website'];
$username = $_POST['username'];
$password = $_POST['password'];
$md5Hash = $_POST['md5Hash'];


$sql = "INSERT INTO hashvalue (website, username, password, md5Hash) VALUES ('$website', '$username', '$password', '$md5Hash')";
if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>
