<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tolgate";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql  = "select * from rfid where id = (select max(id) from rfid)";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo $row['id'];
    }
}else{
	echo "0";
}
$conn->close();

?>

