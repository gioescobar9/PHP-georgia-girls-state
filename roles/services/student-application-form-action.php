<html>
    <body>
        <?php
            session_start();
            require_once 'connectAuxDB.php';

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
        
            //$arr = array($studentFirstName, $studentLastName, $studentEmail);
            //$json = json_encode($arr);
            
            $post_data = array(
                    //'student' => array(
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
                //)
            );
        $resultStr ="";
        foreach ($post_data as $key => $value)
        {
            $resultStr .= "$key:$value^";
        }
           echo $resultStr; 
            //echo json_encode($post_data);
            //echo '<pre>'; print_r($json); echo '</pre>';
        echo "your information was submitted, and ypu will be redirected to the parent consent form";
            //$query = "INSERT INTO applications(applicationID, auxInfo, schoolInfo, studentInfo, auxiliaryID, schoolID) VALUES ('','','','{$resultStr}','','')";
             
            $query = "UPDATE applications SET studentInfo='{$resultStr}', studentInfoComplete='1' WHERE applicationID='1'";
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            $redirect="../parent-consent-form.php";
        
            //header('locaiton:'$redirect);
        
            header( "refresh:5;url='$redirect'" );
                
        ?>
        
        
    </body>
</html>
