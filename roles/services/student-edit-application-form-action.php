<?php 
            session_start();
            require_once "php-functions.php";
            require_once 'connectAuxDB.php';

            studentLoggedin();

            $auxConnection=connectAuxDB();
        
        
            $auxConnection=connectAuxDB();
            //get the studentID of the student that is logged in
            $studentID = $_COOKIE['studentID'];
            
            $studentFirstName = $_POST["studentFirstName"];
            $studentMiddleName = $_POST["studentMiddleName"];
            $studentLastName = $_POST["studentLastName"];
            $studentDOB = $_POST["studentDOB"];
            $studentStreetAddress = $_POST["studentStreetAddress"];
            $studentCity = $_POST["studentCity"];
            $studentState = $_POST["studentState"];
            $studentZip = $_POST["studentZip"];
            $studentPreferName = $_POST["studentPreferName"];
            $homePhone = $_POST["homePhone"];
            $parentCellPhone = $_POST["parentCellPhone"];
            $emergencyPhone = $_POST["emergencyPhone"];
            $girlsCell = $_POST["girlsCell"];
            $studentEmail = $_POST["studentEmail"];
            $parentEmail = $_POST["parentEmail"];
            $studentSignature = $_POST["studentSignature"];
            $parentSignature = $_POST["parentSignature"];
        
            //place all the form input into an assc array    
            $post_data = array(
                    'studentFirstName' => $studentFirstName,
                    'studentMiddleName' => $studentMiddleName,
                    'studentLastName' => $studentLastName,
                    'studentDOB' => $studentDOB,
                    'studentStreetAddress' => $studentStreetAddress,
                    'studentCity' => $studentCity,
                    'studentState' => $studentState,
                    'studentZip' => $studentZip,
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

            //place all values from the assc array into a string so we can insert into the application table
            foreach ($post_data as $key => $value)
            {
                $resultStr .= "$key:$value^";
            } 
            
             
            $query = "UPDATE applications SET studentInfo='{$resultStr}', studentInfoComplete='1' WHERE studentID='$studentID'";
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            $redirect="../student-interface.php";
        
            //redirect the user to the home page
            echo "<script>alert('Your Information has been submitted')</script>";
            header('location:'.$redirect);
                
?>
        
        
    </body>
</html>
            
