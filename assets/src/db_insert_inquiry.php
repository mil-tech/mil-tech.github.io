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

                $name = $_POST['name'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $company = $_POST['company'];
                $message = $_POST['message'];

                $query = "INSERT INTO `inquiry`(`inquiry_id`, `inquiry_name`, `inquiry_company`, `inquiry_email`, `inquiry_contact`, `inquiry_message`, `inquiry_date`, `inquiry_status`) 
                        VALUES (NULL,'". $name ."', '". $company ."', '". $email ."', '". $contact ."', '". $message ."', CURRENT_TIMESTAMP(), 'NEW');";
                
                if(mysqli_query($conn, $query)){
                    echo 'Insert Inquiry Success.';}
                else{
                    echo 'Insert Inquiry Failed.' . "<br>" . mysqli_error($conn);}
                
                
                mysqli_close($conn);



?>