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

                //echo "db_get_inquiry reached file";

                $rows = array();

                $query = "SELECT `inquiry_id`, `inquiry_name`, `inquiry_company`, `inquiry_email`, `inquiry_contact`, `inquiry_message`, `inquiry_date`, `inquiry_status` 
                FROM `inquiry` ORDER BY `inquiry_id` ASC;";

                if($query_result = mysqli_query($conn, $query)){
                    //echo "Records fetched.";
                    if(mysqli_num_rows($query_result) > 0){
                        while($row = mysqli_fetch_assoc($query_result))
                        {
                            array_push($rows, $row);
                        }
                        echo json_encode($rows);
                        //echo $rows;
                        
                    }
                    else{
                        echo 'Get Inquiry Records Failed.' . "<br>" . mysqli_error($conn);
                    }
                } 
                mysqli_close($conn);
?>