<html>
    <body>
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
        
            $query = "SELECT schoolInfo FROM applications WHERE schoolID='1'";
            
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
        ?>
        
            <head>
                <title>My Students</title>
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
   
                <div class="heading">
                    <h1 align="center" class="loginHeader"><img src="../images/icon.jpg">
                        <a href = "..//school-interface.php"><span style = "float: left; margin-right: -20%" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-home"><br>Home</span></a><br>The American Legion Auxiliary<br>Georgia Girls State</h1>
                </div>
            <br>
            </header>
            
                <h3>My Student Applications</h3>
            
        
        <table style="width:100%; border: 3px solid black; border-radius:10px;"><tr style="border:1px solid black; padding:5px; border-radius:10px;"><th style="border:1px solid black; padding:5px; border-radius;10px;">Student First Name</th><th style="border:1px solid black; padding:5px;">Student Last Name</th><th style="border:1px solid black;padding:5px;">Student Rank</th><th style="border:1px solid black;padding:5px;">Student Grad Date</th><th style="border:1px solid black;padding:5px;"> Official First Name</th><th style="border:1px solid black;">Official Last Name</th><th style="border:1px solid black;">Official Phone</th><th style="border:1px solid black;padding:10px;">Official Email</th><th style="border:1px solid black;padding:5px;">Official Signature</th><th style="border:1px solid black;padding:5px;">Date Signed</th></tr></td><br>
         </html>
            
        <?php
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
        }
        
        //print_r($asscStudent);
        //print_r($item);
        $looper=0;
        echo"<tr>";
        foreach($item as $x){
            if($looper>3){
                echo"<td style='text-align:center; border:1px solid black; padding:5px;'>".($x." ")."</td>";
            }
            $looper++;
        }
        //echo"</table>";
        echo"</tr>";
        echo"<br>";

        ?>
        </table>
    </body>
</html>