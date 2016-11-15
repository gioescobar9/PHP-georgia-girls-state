<html>
    <body>
        <?php
        
            session_start();
            require_once 'connectAuxDB.php';

            $auxConnection=connectAuxDB();
        
        
            $schoolName = $_POST["schoolName"];
            $schoolAddressStreet = $_POST["schoolAddressStreet"];
            $schoolAddress = $_POST["schoolAddress"];
            $schoolPhone = $_POST["schoolPhone"];
            $studentFirstName = $_POST["studentFirstName"];
            $studentLastName = $_POST["studentLastName"];
            $studentRank = $_POST["studentRank"];
            $studentGradDate = $_POST["studentGradDate"];
            $officialFirstName = $_POST["officialFirstName"];
            $officialLastName = $_POST["officialLastName"];
            $officialPhone = $_POST["officialPhone"];
            $officialEmail = $_POST["officialEmail"];
            $officialSignature = $_POST["officialSignature"];
            $signDate = $_POST["signDate"];
            
        
              $post_data = array(
                    'schoolname' => $schoolName,
                    'schoolAddressStreet' => $schoolAddressStreet,
                    'schoolAddress' => $schoolAddress,
                    'schoolPhone' => $schoolPhone,
                    'studentFirstName' => $studentFirstName,
                    'studentLastName' => $studentLastName,
                    'studentRank' => $studentRank,
                    'studentGradDate' => $studentGradDate,
                    'officialFirstName' => $officialFirstName,
                    'officialLastName' => $officialLastName,
                    'officialPhone' => $officialPhone,
                    'officialEmail' => $officialEmail,
                    'officialSignature' => $officialSignature,
                    'signDate' => $signDate,
            );
        //echo json_encode($post_data);
        $resultStr ="";
        foreach ($post_data as $key => $value)
        {
            $resultStr .= "$key:$value^";
        }
           echo $resultStr;
            //echo json_encode($post_data);
            //echo '<pre>'; print_r($json); echo '</pre>';
            //$query = "INSERT INTO applications(applicationID, auxInfo, schoolInfo, studentInfo, auxiliaryID, schoolID) VALUES ('','','','{$resultStr}','','')";
             
            //$query = "UPDATE applications SET schoolInfo='{$resultStr}' WHERE applicationID='1'";
            
             $query = "UPDATE applications SET schoolInfo ='{$resultStr}',schoolInfoComplete='1' WHERE applicationID='1'";
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            echo "your information was submitted, and you will be redirected to the home page";
            $redirect="../school-interface.php";
        
            //header('locaiton:'$redirect);
        
            header( "refresh:5;url='$redirect'" );
        ?>
    </body>
</html>
