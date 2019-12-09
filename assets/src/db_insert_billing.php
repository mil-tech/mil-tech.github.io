<?php

    $host = "localhost";            
    $username = "root";
    $password = "";            
    $db_name = "codeninja";                        
                
    // $host = "server53.web-hosting.com";
    // $username = "codedehs_admin";
    // $password = "Pass@Word1";
    // $db_name = "codedehs_codeninja";               

    $conn = mysqli_connect($host,$username,$password, $db_name);

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();}

    $accountid = $_POST['accountname'];
    $date = $_POST['billingdate'];
    $status = $_POST['billingstatus'];
    $remarks = $_POST['remarks'];
    $createddate = (new \DateTime())->format('Y-m-d H:i:s');

    $attachments = [];
    //initialize default attachment's value
    $ctr = 0;
    for($ctr=0; $ctr < 7; $ctr++){
        array_push($attachments, NULL);
    }

    //initialize attachment variables
    if(isset($_POST['attachedFiles'])){
        $files = explode(',', $_POST['attachedFiles']);
        foreach($files as $key => $value) {
            $attachments[$key] = $value;
        }
    }
    //echo 'Files: ' . json_encode($attachments);

    $query = "INSERT INTO `billing`(`billing_id`, `billing_accountid`, `billing_date`, `billing_status`, `billing_remarks`, `billing_attachment1`, `billing_attachment2`, `billing_attachment3`, `billing_attachment4`, `billing_attachment5`, `billing_attachment6`, `billing_attachment7`, `billing_createddate`)
        VALUES (NULL,'". $accountid ."', '". $date ."', '". $status ."', '". $remarks ."', '".$attachments[0] ."', '".$attachments[1] ."', '".$attachments[2] ."','".$attachments[3] ."','".$attachments[4] ."','".$attachments[5] ."','".$attachments[6] ."', '".$createddate."');";
                
    if(mysqli_query($conn, $query)){
        echo 'Insert Inquiry Success. ';
    }else{
        echo 'Insert Inquiry Failed.' . "<br>" . mysqli_error($conn);}
                
                
    mysqli_close($conn);



?>