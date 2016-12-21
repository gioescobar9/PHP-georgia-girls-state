        <?php
        
            session_start();
            require_once 'php-functions.php';
            schoolLoggedIn();
            require_once 'connectAuxDB.php';

        
            $schoolID = $_COOKIE['schoolID'];

            //retrieve the student id from url using GET
            $id = null;
            if(!empty($_GET['id'])){
                $id = $_REQUEST['id'];
            }
            if($id == null){
                header("location: ../school-interface.php");
            }
        
            $auxConnection=connectAuxDB();
            
        
            //retrieve all form input
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
            

            
            //place all form input into an array
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

        //place the values of the array into a string so we can insert the string into the DB
        foreach ($post_data as $key => $value)
        {
            $resultStr .= "$key:$value^";
        }
        //echo $resultStr;
      
            
        //insert the string into the table
        $query = "UPDATE applications SET schoolInfo ='{$resultStr}',schoolInfoComplete='1' WHERE studentID='$id'";
        $result = $auxConnection->query($query);
        if(!$result) die ("query failed".$auxConnection->error);
        
        echo "<script>alert('Your Information has been submitted')</script>";

            

        $redirect="school-application-view.php";
        
        header('location:'.$redirect);
?>
