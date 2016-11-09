<html>
    <body>
        <?php
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
            echo $studentFirstName.":".$studentLastName;
        
            //$arr = array($studentFirstName, $studentLastName, $studentEmail);
            //$json = json_encode($arr);
            
            $post_data = array(
                    'student' => array(
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
                )
            );
            
            echo json_encode($post_data);
            //echo '<pre>'; print_r($json); echo '</pre>';
        ?>
    </body>
</html>
