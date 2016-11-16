<html>
    <body>
        <?php
        
            session_start();
            require_once 'connectAuxDB.php';

            $auxConnection=connectAuxDB();
        
            $query = "SELECT studentInfo FROM applications WHERE schoolID='1'";
            
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
        
        foreach($studentInfo as $values)
        {

            echo "<tr><td>";

            echo "$values<br>";

            echo "</td></tr>";
        }

?>
        ?>
    </body>
</html>