<?php
            session_start();
            require_once "php-functions.php";
            require_once 'connectAuxDB.php';

            studentLoggedin();

            $auxConnection=connectAuxDB();
            
            //get studentID to know which application to update
            $studentID = $_COOKIE["studentID"];
        
            //get all form values from form
            $studentFirstName = $_POST["studentFirstName"];
            $studentMiddleName = $_POST["studentMiddleName"];
            $studentLastName = $_POST["studentLastName"];
            $studentDOB = $_POST["studentDOB"];
            $studentStreetAddress = $_POST["studentStreetAddress"];
            $studentAddress = $_POST["studentAddress"];
            $studentPreferName = $_POST["studentPreferName"];
            $homePhone = $_POST["homePhone"];
            $parentCellPhone = $_POST["parentCellPhone"];
            $emergencyPhone = $_POST["emergencyPhone"];
            $girlsCell = $_POST["girlsCell"];
            $studentEmail = $_POST["studentEmail"];
            $parentEmail = $_POST["parentEmail"];
            $studentSignature = $_POST["studentSignature"];
            $parentSignature = $_POST["parentSignature"];
            
            //place all form values into an assc array
            $post_data = array(
                    'studentFirstName' => $studentFirstName,
                    'studentMiddleName' => $studentMiddleName,
                    'studentLastName' => $studentLastName,
                    'studentDOB' => $studentDOB,
                    'studentStreetAddress' => $studentStreetAddress,
                    'studentAddress' => $studentAddress,
                    'studentPreferName' => $studentPreferName,
                    'homePhone' => $homePhone,
                    'parentCellPhone' => $parentCellPhone,
                    'emergencyPhone' => $emergencyPhone,
                    'girlsCell' => $girlsCell,
                    'studentEmail' => $studentEmail,
                    'parentEmail' => $parentEmail,
                    'studentSignature' => $studentSignature,
                    'parentSignature' => $parentSignature
            );

        $resultStr ="";
        //create a string from the assc array and spilt the values with '^'
        foreach ($post_data as $key => $value)
        {
            $resultStr .= "$key:$value^";
        }
           //echo $resultStr; 
             
            //update the application for the student that is logged in
            $query = "UPDATE applications SET studentInfo='{$resultStr}', studentInfoComplete='1' WHERE studentID='$studentID'";
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            //send the user back to the home page
            $redirect="../parent-consent-form.php";
            echo "<script>alert('Your Information has been submitted')</script>";
            
            header( "refresh:1;url='$redirect'" );
                
?>
        
 
