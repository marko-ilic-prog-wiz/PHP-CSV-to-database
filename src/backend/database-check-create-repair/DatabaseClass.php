<?php
$rootD = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($rootD . "/backend/common-php-functions/common-functions.php");

class DatabaseClass extends mysqli
{
    private static $instance = null;

    private $user = DBUSER;
    private $pass = DBPWD;
    private $dbHostPort = DBHOST . ':' . DBPORT;

    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __clone() {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup() {
        trigger_error('Deserializing is not allowed.', E_USER_ERROR);
    }

    public function __construct() {
        //below - 'p:' stands for persistent
        if($GLOBALS['databaseNameValue']===""){
            parent::__construct('p:' . $this->dbHostPort, $this->user, $this->pass);
        }
        else{
            parent::__construct('p:' . $this->dbHostPort, $this->user,
                $this->pass,$GLOBALS['databaseNameValue']);
        }
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
        parent::set_charset('utf8');

    }

    public function dbquery($query)
    {
        if($this->query($query))
        {
            return true;
        }
    }

    public function get_result($query,$lineBreak)
    {
        try
        {
            $result = $this->query($query);
        } catch (mysqli_sql_exception $e) {
            writeToErrorLog($e->getMessage());
            return false;
        }
        if($result){
            if ($result!==NULL&&$result->num_rows!==NULL&&$result->num_rows > 0)
            {
                if($result->num_rows===1)
                {
                    $localResult="";
                    for($count=0;$count<$result->num_rows;$count++){
                        $localResult .= $lineBreak . implode("",$result->fetch_assoc());
                    }
                    return trim($localResult);
                }
                else
                {
                    $localResult="";
                    for($count=0;$count<$result->num_rows;$count++){
                        $localResult .= $lineBreak . implode("",$result->fetch_assoc());
                    }
                    return trim($localResult);
                }
            } else
            {
                return null;
            }
        } else
            return null;
    }
}
