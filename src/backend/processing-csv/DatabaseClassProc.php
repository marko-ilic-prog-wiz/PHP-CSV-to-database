<?php

class DatabaseClassProc extends mysqli
{
    private static $instance = null;

    private $user = DBUSER;
    private $pass = DBPWD;
    private $dbHostPort = DBHOST . ':' . DBPORT;
    private $dbName = DBNAME;
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        trigger_error('Deserializing is not allowed.', E_USER_ERROR);
    }

    public function __construct()
    {
        //below - 'p:' stands for persistent
        parent::__construct('p:' . $this->dbHostPort, $this->user,$this->pass,$this->dbName);
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
        parent::set_charset('utf8');

    }

    public function dbquery($query)
    {
        if ($this->query($query)) {
            return true;
        }
    }

    public function get_result($query, $lineBreak)
    {
        writeToDebug($query);
        try
        {
            $result = $this->query($query);
        } catch (mysqli_sql_exception $e) {
            writeToErrorLog($e->getMessage());
            return false;
        }
        $result = $this->query($query);
        if ($result !== NULL && $result) {
            if (isset($result)&&isset($result->num_rows)
                &&property_exists($result,"num_rows")&& $result->num_rows !== NULL && $result->num_rows > 0) {
                if ($result->num_rows === 1) {
                    $row = $result->fetch_assoc();
                    return $row;
                } else {
                    $localResult = "";
                    for ($count = 0; $count < $result->num_rows; $count++) {
                        $localResult .= $lineBreak . implode("|", $result->fetch_assoc());
                    }
                    return $localResult;
                }
            } else
                return null;
        } else
            return null;
    }

    public function get_result_as_array($query)
    {
        $resultArray = array();
        $result = $this->query($query);
        if ($result) {
            if ($result !== NULL && $result->num_rows !== NULL && $result->num_rows > 0) {
                if ($result->num_rows === 1) {
                    $resultArray[] = $result->fetch_assoc();
                    return $resultArray;
                } else {
                    $localResult = "";
                    for ($count = 0; $count < $result->num_rows; $count++) {
                        $resultArray[] = implode("|", $result->fetch_assoc());
                    }
                    return $resultArray;
                }
            } else
                return $resultArray;
        } else
            return $resultArray;
    }
}