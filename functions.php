<?php
session_start();
function connection(){
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="todolist";
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    return ($conn);

}


function get_data(){
    $conn=connection();
    $sql='SELECT * FROM  todo';
    $result=$conn->query($sql);
    if(!$result){ 
        return null ;
     }
     $data=array();
        while($row=$result->fetch_assoc()){
            $mission=$row['the_mission'];
            $date=$row['execution_time'];
            $id=$row['id'];
            $data[]=array('id'=>$id,'mission'=>$mission,'date'=>$date);
        }

    return ($data);
}




function insert($text,$date){
    $conn=connection();
    $sql="INSERT INTO todo (the_mission, execution_time) VALUES ('$text','$date')";
    $result=$conn->query($sql);
    if($result){
        return(" data not insert");
    }
}


function deletee($id){
    $conn=connection();
    $sql = "DELETE FROM todo WHERE id = {$id}";
    $res=$conn->query($sql);
    
}