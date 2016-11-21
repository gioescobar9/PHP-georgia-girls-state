<?php
        
            session_start();
        if(!isset($_SESSION["loggedIn"])){
            header('location: index.php');
        }
        if(!isset($_SESSION["schoolLoggedIn"])){
            header('location: index.php');
        }
            require_once 'connectAuxDB.php';

            $auxConnection=connectAuxDB();
        $id = null;
if(!empty($_GET['id'])){
    $id = $_REQUEST['id'];
}
if($id == null){
    header("location: ../school-interface.php");
}
            //$studentID = $_COOKIE['studentID'];
        
            $query = "SELECT schoolInfo FROM applications WHERE studentID='$id'";
            
            $result = $auxConnection->query($query);
            if(!$result) die ("query failed".$auxConnection->error);
        
            $rows = $result->num_rows;
            
        $info = mysqli_fetch_assoc($result); 
        //print_r ($info);
        

        foreach($info as $x => $x_value) {
            //echo "Key=" . $x . ", Value=" . $x_value;
            //echo "<br>";
        }
        
        //echo "$x_value";
        
        $studentInfo = explode("^",$x_value);
        //print_r($studentInfo);
        $stringInfo = "";
        $item = array();
        $asscStudent = array();
        $i=1;
        $count=count($studentInfo);
    
        foreach($studentInfo as $values)
        {
            //echo"$count";
            $stringInfo = $values;
            if($i < $count)
            {
                //echo"$i";
                //echo"$stringInfo";
                $newStringInfo = explode(":",$stringInfo);
                $asscStudent=array("$newStringInfo[0]"=>"$newStringInfo[1]");
            }
            $i++;
            
            $item = array_merge($item, $asscStudent);
            //echo $item["schoolname"];
        }
        //print_r($item);
        ?>
        <html>
            <head>
                <title>Edit Applications</title>
                <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
                <script src="dist/js/bootstrap-checkbox.min.js" defer></script>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

                <script src="jquery-1.12.4.min.js"></script>
                <script src="js/form-validation.js"></script>
                <link rel="stylesheet" type="text/css" href="../css/rolesStyleSheet.css">

            </head>
            <header>
            <body>
                <div class="heading">
                    <h1 align="center" class="loginHeader"><img src="../images/icon.jpg">
                        <a href = "..//school-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-home"><br>Home</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1></a>
                </div>
            <br>
            </header>
            
                <h3>Edit Application</h3>
        <div class="container">
<div class="well">
    <?php
echo "<form class='form-horizontal' role='form' action='school-edit-application-form-action.php?id=".$id."' method='post'>"
?>
    <div class="form-group">
        <h3>School Information Form</h3>
        <legend>School Details</legend>
        <div class="col-md-12">
            <label for = "schoolName">School Name: </label>
                <input type="text" class="form-control" name="schoolName" maxlength="50" required autofocus value="<?php echo $item["schoolname"];?>"><br>
        </div>
        <div class="col-md-6">
            <label for = "schoolAddressStreet">School Street:</label>
               <input type="text" class="form-control" name="schoolAddressStreet" maxlength="25" required value="<?php echo $item["schoolAddressStreet"];?>"><br>
        </div>
        <div class="col-md-6">
            <label for = "schoolAddress">City,State,Zip: </label>
                <input type="text" class="form-control" name="schoolAddress" maxlength="25" placeholder="City,State,Zip" required value="<?php echo $item["schoolAddress"];?>"><br>
        </div>
        <div class="col-md-12">
            <label for = "schoolPhone"> School Phone Number: </label>
                <input type="text" class="form-control" name="schoolPhone" maxlength="15" placeholder= "(XXX)XXX-XXXX" required value="<?php echo $item["schoolPhone"];?>"><br>
        </div>
        <div class = "col-md-12">
        <legend>Student Information</legend>
        </div>
        <div class="col-md-6">
            <label for = "studentFirstName">Student's First Name:</label>
               <input type="text" class="form-control" name="studentFirstName" maxlength="25" autofocus value="<?php echo $item["studentFirstName"];?>"><br>
        </div>
        <div class="col-md-6">
            <label for = "studentLastName">Student's Last Name:</label>
               <input type="input" class="form-control" name="studentLastName" maxlength="25" required value="<?php echo $item["studentLastName"];?>"><br>
        </div>
        <div class="col-md-6">
            <label for = "studentRank">Class Rank:</label>
               <input type="text" class="form-control" name="studentRank" maxlength="3" required value="<?php echo $item["studentRank"];?>"><br>
        </div>
        <div class="col-md-6">
            <label for = "studentGradDate">Expected Graduation Date:</label>
               <input type="date" class="form-control" name="studentGradDate" required value="<?php echo $item["studentGradDate"];?>"><br>
        </div>
        <div class = "col-md-12">
        <legend>School Official Information </legend>
        </div>
        <div class = "col-md-6">
            <label for = "officialFirstName"> First Name: </label>
                <input type="text" class="form-control" name="officialFirstName" maxlength="25" required value="<?php echo $item["officialFirstName"];?>"><br>
        </div>
        <div class="col-md-6">
            <label for = "officialLastName"> Last Name: </label>
                <input type="text" class="form-control" name="officialLastName" maxlength="25" required value="<?php echo $item["officialLastName"];?>"><br>
        </div>
        <div class="col-md-6">
            <label for = "officialPhone"> Official Phone Number: </label>
                <input type="text" class="form-control" name="officialPhone" maxlength="15" placeholder="(888)555-0000"required value="<?php echo $item["officialPhone"];?>"><br>
        </div>
        <div class="col-md-6">
            <label for = "officialEmail"> Official Email: </label>
                <input type="email" class="form-control" name="officialEmail" maxlength="50"  required value="<?php echo $item["officialEmail"];?>"><br>
        </div>
        <div class="col-12-md">
        <legend>Authorization</legend>
        </div>
        <div class="col-md-6">
            <label for = "officialSignature"> Please Sign to Agree to the Updated Information: </label>
                <input type="text" class="form-control" name="officialSignature" maxlength="15" placeholder="Electronic Signature"required><br>
        </div>
        <div class="col-md-6">
            <label for = "signDate">Date:</label>
                <input type="date" class="form-control" name="signDate" placeholder="mm/dd/yyyy"required><br>
        </div>
    </div>
    
    <div class="buttonStudent">
            <button type="submit" class="buttonSubmit" color="black">Update Information</button>
    </div>
    </form>
            </div>
        </div>
 
    </body>
</html>