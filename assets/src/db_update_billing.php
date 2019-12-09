<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

$host = "localhost";            
$username = "root";
$password = "";            
$db_name = "codeninja";                        
             
$conn = mysqli_connect($host,$username,$password, $db_name);

if(mysqli_connect_errno()){
   echo "Failed to connect to MySQL: " . mysqli_connect_error();}


if ($input['action'] === 'edit') {
    $query = "UPDATE `billing` SET `billing_status`='" . $input['billingstatus'] . "', `billing_remarks`='" . $input['remarks'] . "' WHERE `billing_id`='" . intval($input['billingid']) . "';";
    
    if(mysqli_query($conn, $query)){
        echo 'Update Success.';
    }
    else{
        echo 'Update Failed.' . "<br>" . mysqli_error($conn);
    }

} else if ($input['action'] == 'delete') {
    $mysqli->query("UPDATE users SET deleted=1 WHERE id='" . $input['id'] . "'");

} else if ($input['action'] == 'restore') {
    $mysqli->query("UPDATE users SET deleted=0 WHERE id='" . $input['id'] . "'");
}

mysqli_close($conn);

echo json_encode($input);