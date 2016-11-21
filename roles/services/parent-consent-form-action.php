<html>
    <body>
        <?php
        
        session_start();
        if(!isset($_SESSION["loggedIn"])){
            header('location: index.php');
        }
        if(!isset($_SESSION["studentLoggedIn"])){
            header('location: index.php');
        }
        
        $studentID = $_COOKIE['studentID'];
            require_once 'connectAuxDB.php';

            $auxConnection=connectAuxDB();
        
            $motherName = $_POST["motherName"];
            $motherPhone = $_POST["motherPhone"];
            $fatherName = $_POST["fatherName"];
            $fatherPhone = $_POST["fatherPhone"];
            $emergencyName = $_POST["emergencyName"];
            $emergencyRelationship = $_POST["emergencyRelationship"];
            $emergencyPhone = $_POST["emergencyPhone"];
            $illnessInput = $_POST["illnessInput"];
            $treatmentInput = $_POST["treatmentInput"];
            $allergiesInput = $_POST["allergiesInput"];
            $medsInput = $_POST["medsInput"];
            $accomodationsInput = $_POST["accomodationsInput"];
            $restrictionsInput = $_POST["restrictionsInput"];
            $physicianName = $_POST["physicianName"];
            $physicianPhoneNumber = $_POST["physicianPhoneNumber"];
            $insuranceCompany = $_POST["insuranceCompany"];
            $insuranceGroup = $_POST["insuranceGroup"];
            $insuranceGroupNumber = $_POST["insuranceGroupNumber"];
            $insuranceAddressStreet = $_POST["insuranceAddressStreet"];
            $insuranceAddress = $_POST["insuranceAddress"];
            $childsName = $_POST["childsName"];
            $enterChildsName = $_POST["enterChildsName"];
            $consentInput = $_POST["consentInput"];
            $conditionInput = $_POST["conditionInput"];
            $parentSignature = $_POST["parentSignature"];
            $signDate = $_POST["signDate"];
        
            $post_data = array(
                'motherName' => $motherName,
                'motherPhone' => $motherPhone,
                'fatherName' => $fatherName,
                'fatherPhone' => $fatherPhone,
                'emergencyName' => $emergencyName,
                'emergencyRelationship' => $emergencyRelationship,
                'emergencyPhone' => $emergencyPhone,
                'illnessInput' => $illnessInput,
                'treatmentInput' => $treatmentInput,
                'allergiesInput' => $allergiesInput,
                'medsInput' => $medsInput,
                'accomodationsInput' => $accomodationsInput,
                'restrictionsInput' => $restrictionsInput,
                'physicianName' => $physicianName,
                'physicianPhoneNumber' => $physicianPhoneNumber,
                'insuranceCompany' => $insuranceCompany,
                'insuranceGroup' => $insuranceGroup,
                'insuranceGroupNumber' => $insuranceGroupNumber,
                'insuranceAddressStreet' => $insuranceAddressStreet,
                'insuranceAddress' => $insuranceAddress,
                'childsName' => $childsName,
                'enterChildsName' => $enterChildsName,
                'consentInput' => $consentInput,
                'conditionInput' => $conditionInput,
                'parentSignature' => $parentSignature,
                'signDate' => $signDate,
              );
                
                $resultStr ="";
        foreach ($post_data as $key => $value)
        {
            $resultStr .= "$key:$value^";
        }
           //echo $resultStr;
        
     
        
        
        $query = "UPDATE applications SET parentConsentInfo='{$resultStr}',parentConsentInfoComplete='1' WHERE studentID='$studentID'";
        $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
        echo "<script>alert('Your Information has been submitted')</script>";
        $redirect = "../student-interface.php";
        header( "refresh:1;url='$redirect'" );
        
        
        ?>
    </body>
</html>