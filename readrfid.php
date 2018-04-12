<?php
$deviceid = $_GET['temp'];
$servername = "localhost";
$username = "root";
$password = "mysqleptp";
$dbname = "KLUIOT";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql  = "select * from RFID_REG where ID = (select max(ID) from RFID_REG where Device_ID = '".$deviceid."')";
$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo $row['ID'];
    }
}else{
	echo "0";
}
$conn->close();

?>

