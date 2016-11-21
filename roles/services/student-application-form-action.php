<?php
            session_start();
            if(!isset($_SESSION["loggedIn"])){
                header('location: index.php');
            }
            if(!isset($_SESSION["studentLoggedIn"])){
                header('location: index.php');
            }
            require_once 'connectAuxDB.php';
        
            $studentID = $_COOKIE["studentID"];
            $auxConnection=connectAuxDB();
        
            
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
        foreach ($post_data as $key => $value)
        {
            $resultStr .= "$key:$value^";
        }
           //echo $resultStr; 
             
            $query = "UPDATE applications SET studentInfo='{$resultStr}', studentInfoComplete='1' WHERE studentID='$studentID'";
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            $redirect="../parent-consent-form.php";
            

            
            echo "<script>alert('Your Information has been submitted')</script>";
            
            header( "refresh:1;url='$redirect'" );
                
?>
        
 
