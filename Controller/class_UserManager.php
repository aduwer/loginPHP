<?php
    class UserManager {

        function loginForm() {
            ?>
            <h3>Formularz logowania</h3>
            <form action="loginProcess.php" method="post">
            <table>
		    <tbody>
            <tr>
                <td> Login: </td> <td> <input name="userName" /> </td> 
            </tr>

            <tr>
                <td> Hasło: </td> <td> <input type="password" name="password" /> </td>
            </tr>
            
            </tbody>
            </table>
            <input type="submit" value="Zaloguj" name="zaloguj" />
            </form>
     
            <?php
        }

        function login($db) {                                                                    /* correct loggin, return user id */
            $args = [
            'userName' => FILTER_SANITIZE_MAGIC_QUOTES,
            'password' => FILTER_SANITIZE_MAGIC_QUOTES
            ];
            $data = filter_input_array(INPUT_POST, $args);                                       /* filter the data */
            $login = $data["userName"];                                                         
            $password = $data["password"];
            $userId = $db->selectUser($login, $password, "users");
            if ($userId >= 0) {                                                                 
                session_start();                                                                 /* session start */
                $sqlhistoricalentries = "DELETE FROM logged_in_users WHERE userID = '$userId'";  /* delete historical entries */
                $db->delete($sqlhistoricalentries);                              
                $date = Date('Y-m-d H:i:s');                                                     /* type Date */
                $sessionID = session_id();                                                       
                $sql = "INSERT INTO logged_in_users VALUES ('$sessionID', '$userId','$date')";
                $db->insert($sql);
            }
            return $userId;
        }

        function logout($db) {
            session_start();                                                                    
            $sessionID = session_id();                                                          /* session id */
            if(isset($_COOKIE[session_name()]) ) {
                setcookie(session_name(),'', time() - 42000, '/');                              /* session deletion */ 
            }
            session_destroy();
            $sql = "DELETE FROM logged_in_users WHERE sessionId = '$sessionID'";                /* detele record from table with sessionID */
            $db->delete($sql);
           
        }
    
        function getLoggedInUser($db, $sessionId) {                                             /* found an entry with session id in the logged_in_users table */
            return $db->getUserId($sessionId);     
        }
   }

?>