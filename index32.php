<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tolgate";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql  = "select * from control where id = (select max(id) from control)";

$result = $conn->query($sql);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
       // echo "rfid";
       $id =  $row['id']; 
       $rfid =  $row['state'];
       
            echo "id,";
            echo $id;            
            echo ",rfid,";
            echo $rfid;
    }
}
$conn->close();

?>

