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
       // echo "rfid";
       $id =  $row['id']; 
       $rfid =  $row['rfid'];
       $sql = "select * from authorised where value = '".$rfid."'";
            $result1 = $conn->query($sql);
            if($result1->num_rows>0){
                        $rfid = 1;
                        }
                        else{
                            $rfid = 0;
                        }

            echo "id,";
            echo $id;            
            echo ",rfid,";
            echo $rfid;
    }
}
$conn->close();

?>

