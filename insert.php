<?php
if(isset($_POST['submit'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tolgate";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO newuser (name,purpose,image)
VALUES ('".$_POST["name"]."','".$_POST["purpose"]."','".$_POST["test"]."')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
}
?>