<?php
        
            session_start();
            require_once 'connectAuxDB.php';
        
            if(!isset($_SESSION["loggedIn"])){
                header('location: index.php');
            }
        
            if(!isset($_SESSION["schoolLoggedIn"])){
                header('location: index.php');
            }
        
        
            if(!empty($_GET['id'])){
                $id = $_REQUEST['id'];
            }
        
            if($id == null){
                header("location: ../school-interface.php");
            }
        
        
            $auxConnection=connectAuxDB();
            //$schoolID = $_COOKIE['schoolID'];
        
        
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
           
            
            $query = "UPDATE applications SET schoolInfo ='{$resultStr}',schoolInfoComplete='1' WHERE studentID='$id'";
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            echo "<script>alert('Your Information has been submitted')</script>";
            $redirect="../school-interface.php";
        
            //header('location:'.$redirect);
        
            header( "refresh:1;url='$redirect'" );
?>
 