<?php

    $host = "localhost";            
    $username = "root";
    $password = "";            
    $db_name = "codeninja";                          

    $conn = mysqli_connect($host,$username,$password, $db_name);

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();}

    
    $query = "SELECT `billing_id`, `billing_accountid`, `billing_date`, `billing_status`, `billing_remarks`, `billing_attachment1`, `billing_attachment2`, `billing_attachment3`, `billing_attachment4`, `billing_attachment5`, `billing_attachment6`, `billing_attachment7`, `billing_createddate`, (SELECT `account_companyname` FROM account where `account_id` = `billing_accountid` ) AS `billing_accountname` FROM `billing` ORDER BY `billing_id` ASC;";

    $rows = array();    

    if($query_result = mysqli_query($conn, $query)){
        //echo "Records fetched.";
        if(mysqli_num_rows($query_result) > 0){
            while($row = mysqli_fetch_assoc($query_result)){
                array_push($rows, $row);
        }
        echo json_encode($rows);
        //echo $rows;
        } else{
            echo 'No Records Found';}
   } else{
            echo 'Get Contact Records Failed.' . "<br>" . mysqli_error($conn);
            }

    mysqli_close($conn);



?>