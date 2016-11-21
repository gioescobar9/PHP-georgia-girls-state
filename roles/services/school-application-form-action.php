        <?php
        
            session_start();
            if(!isset($_SESSION["loggedIn"])){
                header('location: index.php');
            }
            if(!isset($_SESSION["schoolLoggedIn"])){
                header('location: index.php');
            }
            require_once 'connectAuxDB.php';

        
            $schoolID = $_COOKIE['schoolID'];
        
        
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
        
        $resultStr ="";
        foreach ($post_data as $key => $value)
        {
            $resultStr .= "$key:$value^";
        }
           echo $resultStr;
        
            
             $query2 = "SELECT studentID FROM Student WHERE firstName ='$studentFirstName' AND lastName='$studentLastName' AND schoolID='$schoolID'";
            
        /*echo "$studentFirstName";
        echo "$studentLastName";
        echo "$schoolID";*/
        
            $result2 = $auxConnection->query($query2);
            if(!$result2) die ("query failed".$auxConnection->error);
            $result2->data_seek(0);
            $record2 = $result2->fetch_array(MYSQLI_ASSOC);
            $studentID = $record2["studentID"];
            $rows = $result2->num_rows;
      
            
        
            $query = "UPDATE applications SET schoolInfo ='{$resultStr}',schoolInfoComplete='1' WHERE schoolID='$schoolID' AND studentID='$studentID'";
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            echo "your information was submitted, and you will be redirected to the home page";
            $redirect="../school-interface.php";
        
            //header('locaiton:'$redirect);
        
            header( "refresh:5;url='$redirect'" );
?>
