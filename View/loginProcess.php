<?php
    include_once '../Model/Database.php';
    include_once '../Controller/class_UserManager.php';
    $db = new Database("localhost", "root", "", "logowanie");
    $um = new UserManager();

    if (filter_input(INPUT_GET, "akcja")=="wyloguj") {                              /* action = "wyloguj" */
        echo 'Zaloguj się ponownie';
        $um->logout($db);
    }

    if (filter_input(INPUT_POST, "zaloguj")) {                                      /* submit = "zaloguj" */
    $userId=$um->login($db);                                                       
    if ($userId > 0) {
        header("location:testLogin.php");
    }

    else {
        echo "<p>Błędna nazwa użytkownika lub hasło</p>";
        $um->loginForm();                                                           /* login form due to bad password */
    }

    }
    else {                                                                          /* login form */
        $um->loginForm();
    }
 ?>