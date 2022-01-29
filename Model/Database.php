<?php
class Database {
    private $mysqli;
    public function __construct($serwer, $user, $pass, $baza){
    $this->mysqli = new mysqli($serwer, $user, $pass, $baza);

    /* check connection */
    if ($this->mysqli->connect_errno) {
        printf("Failed to connect to the server\n",
        $this->mysqli->connect_error);
        exit();
    }
    }           

    function __destruct() {
    $this->mysqli->close();
    }
 
    public function select($sql, $fields) {
    $content = "";
    if ($result = $this->mysqli->query($sql)) {
        $howManyFields = count($fields);                                    /* how many fields */
        $content.="<table><tbody>";
        while ($row = $result->fetch_object()) {
            $content.="<tr>";
            for ($i = 0; $i < $howManyFields; $i++) {
                $p = $fields[$i];
                $content.="<td>" . $row->$p . "</td>";
            }
        $content.="</tr>";
        }
        $content.="</table></tbody>";
        $result->close();                                                   /* free memory */
    }
        return $content;
    }

    public function insert($sql) {
    if( $this->mysqli->query($sql)) 
        return true;
    else 
        return false;
    }

    public function delete($sql){
    if ($this->mysqli->query($sql))
        return true;
    else
        return false;
    }

    public function selectUser($login, $password, $tabela) {
    $id = -1;
    $sql = "SELECT * FROM $tabela WHERE userName='$login'";
    if ($result = $this->mysqli->query($sql)) {
    $howMany = $result->num_rows;
    if ($howMany == 1) {
    $row = $result->fetch_object();                                         /* retrieve record with user */
    $hash = $row->password;                                                 /* get user password */
    if (password_verify($password, $hash))                                  /* password is the same as password in database */
    $id = $row->id;                                                         /* get user id */
    }
    }
    return $id;                                                             /* id>0 or id=-1 */
   }

    function getUserId($sessionId) {
    $id = -1;
    $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '$sessionId'";
    if ($result = $this->mysqli->query($sql)) {
        $row = $result->fetch_object();
        $id = $row->userId;
    }
        return $id;
    }
}
?>
