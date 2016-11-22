 <?php
        
            session_start();
            require_once "php-functions.php";
            require_once 'connectAuxDB.php';

            studentLoggedin();


            $auxConnection=connectAuxDB();
            //get the studentID of student logged in
            $studentID = $_COOKIE['studentID'];
            //query the applications table to get their application
            $query = "SELECT studentInfo FROM applications WHERE studentID='$studentID'";
            
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            $rows = $result->num_rows;
        //place the result into assc array 
        $info = mysqli_fetch_assoc($result); 
        //print_r ($info);
        
        //get the value of the assc array which is the student application
        foreach($info as $x => $x_value) {
            //echo "Key=" . $x . ", Value=" . $x_value;
            //echo "<br>";
        }
        
        
        //split the string based on the '^' delimeter
        $studentInfo = explode("^",$x_value);
        //print_r($studentInfo);
        $stringInfo = "";
        $item = array();
        $asscStudent = array();
        $i=1;
        $count=count($studentInfo);
    
        //loop through the studentinfo array and place the key:values into an assc array    
        foreach($studentInfo as $values)
        {
            $stringInfo = $values;
            if($i < $count)
            {
                $newStringInfo = explode(":",$stringInfo);
                $asscStudent=array("$newStringInfo[0]"=>"$newStringInfo[1]");
            }
            $i++;
            
            $item = array_merge($item, $asscStudent);
        }
    
        $count2 = count($item);
        //check to see if studentinfo is empty
        if(!$count2 > 0){
            $redirect = "../student-interface.php";
            header('location:'.$redirect);
        }
        
        ?>
        
//display form and fill in the previous application information     
<html>
<head>
    <title>Edit Student Application</title>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/form-validation.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/rolesStyleSheet.css">

</head>

<body>
<header>
    <div class="heading">
        <div class="heading">
            <h1 align="center" class="loginHeader"><img src="../images/icon.jpg">
            <a href = "../student-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-home"><br>Home</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
    </div>
</header>
<div class="body">
<!--create a container to wrap the form for easy formatting, class well uses bootsrap for some of CSS. 
Divide each field and label using col-md-3/6/12 for size needed. Collect all information in the form and 
enforce proper restrictions-->
<div class="container">
<div class="well">

<form class="form-horizontal" role="form" action="student-edit-application-form-action.php" method="post">
    <div class="form-group">
           <h3>Student Information Form</h3>
            <div class = "col-md-12">
           <legend>Personal Information</legend>
        </div>
           <div class="col-md-6">
            <label for = "studentFirstName">First Name:</label>
               <input type="text" class="form-control" name="studentFirstName" maxlength="25" autofocus required value="<?php echo $item["studentFirstName"];?>"><br>
           </div>
           <div class="col-md-6">
            <label for = "studentMiddleName">Middle Name:</label>
               <input type="text" class="form-control" name="studentMiddleName" maxlength="25" value="<?php echo $item["studentMiddleName"];?>"><br>
           </div>
           <div class="col-md-6">
            <label for = "studentLastName">Last Name:</label>
               <input type="text" class="form-control" name="studentLastName" required value="<?php echo $item["studentLastName"];?>"><br>
           </div>
           <div class="col-md-6">
            <label for = "studentDOB">Date of Birth:</label>
                <input type="date" class="form-control" name="studentDOB" placeholder="mm/dd/yyyy" required value="<?php echo $item["studentDOB"];?>"><br>
           </div>
              <div class="col-md-6">
                <label for = "studentStreetAddress"> Street Address:</label>
                    <input type="text" class="form-control" name="studentStreetAddress" required value="<?php echo $item["studentStreetAddress"];?>"><br>
              </div>
              <div class="col-md-12">
                <label for = "studentAddress">City,State,Zip:</label>
                    <input type="text" class="form-control" name="studentAddress" required placeholder="City,State,Zip" value="<?php echo $item["studentAddress"];?>">
                    <br>
              </div>
           <div class="col-md-3">
           </div>
           <div class="col-md-6" align="center">
             <label for = "studentPreferName">Name to display on name tag:</label><br>
                <input type="text" class="form-control" name="studentPreferName" maxlength="25"  required value="<?php echo $item["studentPreferName"];?>"><br>
            </div>
          
            <div class="col-md-12">
                <legend>Contact Information</legend>
            </div>
           <div class="col-md-6">
            <label for = "homePhone">Home Phone:</label>
                <input type="text" class="form-control" name="homePhone" maxlength="13" placeholder="(555)888-0000" value="<?php echo $item["homePhone"];?>"><br>
           </div>
           <div class="col-md-6">
            <label for = "parentCellPhone">Parent Cell Phone:</label>
                <input type="text" class="form-control" name="parentCellPhone" maxlength="13" placeholder="(555)888-0000" value="<?php echo $item["parentCellPhone"];?>"><br>
           </div>
           <div class="col-md-6">
            <label for = "emergencyPhone">Emergency Contact Number:</label>
                <input type="text" class="form-control" name="emergencyPhone" maxlength="13" placeholder="(555)888-0000" value="<?php echo $item["emergencyPhone"];?>"><br>
           </div>
           <div class="col-md-6">
               <label for = "girlsCell">Girls Cell Phone:(If Available)</label>
                   <input type="text" class="form-control" name="girlsCell" maxlength="13" placeholder="Optional" value="<?php echo $item["girlsCell"];?>"><br>
           </div>
           <div class="col-md-6">
            <label for = "studentEmail">Student Email:</label>
                <input type="email" class="form-control" name="studentEmail" placeholder="name@email.com" required value="<?php echo $item["studentEmail"];?>"><br>
            </div>
            <div class="col-md-6">
            <label for = "parentEmail">Parent Email:</label>
                <input type="email" class="form-control" name="parentEmail" placeholder="name@email.com" required value="<?php echo $item["parentEmail"];?>"><br>
        </div>
        <div class="col-md-12">
            <legend>Authorization</legend>
        </div>
        <div class ="col-md-12">
            <h5>By signing below I agree that all information provided is correct on behalf of the Student and Parent:</h5><br>
        </div>
      <div class="signature">
        <div class="col-md-6">
            <label for = "studentSignature">Student Signature</label>
                <input type="text" class="form-control" name="studentSignature" placeholder="Electronic Signature" required ><br>
        </div>
        <div class="col-md-6">
            <label for = "parentSignature">Parent Signature</label>
                <input type="text" class="form-control" name="parentSignature" placeholder="Electronic Signature" required><br>
        </div>
    </div>
 
  
</div>

    <div class="buttonStudent">

        <button type="submit" class="buttonSave" color="white">Submit</button>

    </div>
</form>
    
</div>
</div>
        </div>

        </body>
        </html>