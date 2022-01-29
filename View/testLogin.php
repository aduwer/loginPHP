<?php
    include_once '../Model/Database.php';
    include_once '../Controller/class_UserManager.php';
    $db = new Database("localhost", "root", "", "logowanie");
    $um = new UserManager();

    session_start();
    $sessionId = session_id();
    if ($um->getLoggedInUser($db, $sessionId) > 0){                          /* there is a record with sessionID in table logged_in_users */
        echo "<a href='loginProcess.php? akcja=wyloguj' >Wyloguj</a> </p>";
        echo '<h3> Dane zalogowanego użytkownika: </h3>';
        $pola = array ('id','userName','fullName','email','date');
        $id = $um->getLoggedInUser($db, $sessionId);
        $sql = "SELECT * FROM users WHERE id ='$id'";
        echo $db->select($sql,$pola);
    }
    else  header("location:loginProcess.php");
?>
