 <?php
    $_SESSION["loggedIn"] = false;
    $_SESSION["loggedOut"] = false;
    unset($_SESSION["loggedIn"]);
    
    $redirect = "../index.php";
    header("location:".$redirect);
?>