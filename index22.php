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
       $sql = "select * from newuser where value = '".$rfid."'";
            $result1 = $conn->query($sql);
            if($result1->num_rows>0){
                while($row1 = $result1->fetch_assoc()){
                        $image = $row1['image'];
                }
                        $rfid = 1;
                       echo "id_";
            echo $id;            
            echo "_rfid_";
            echo $rfid;
            echo "_image_";
            echo $image;
            }
                        else{
                            $rfid = 0;
                        echo "id_";
            echo $id;            
            echo "_rfid_";
            echo $rfid;
                        }
    }
}
$conn->close();

?>

