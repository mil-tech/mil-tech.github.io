<?php

    $host = "localhost";            
    $username = "root";
    $password = "";            
    $db_name = "codeninja";                          

    $conn = mysqli_connect($host,$username,$password, $db_name);

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();}

    
    $query = "SELECT * FROM `account` ORDER BY `account_id` ASC;";

    $rows = array();    

    if($query_result = mysqli_query($conn, $query)){
        //echo "Records fetched.";
        if(mysqli_num_rows($query_result) > 0){
            while($row = mysqli_fetch_assoc($query_result)){
                array_push($rows, $row);
            }
            echo json_encode($rows);
        } else{
            echo 'No Records Found';
        }

   } else{
        echo 'Get Contact Records Failed.' . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);



?>