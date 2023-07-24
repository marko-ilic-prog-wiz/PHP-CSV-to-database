<?php
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($rootDir . '/backend/config.php');
$GLOBALS['databaseNameValue'] = "";
require_once($rootDir . '/backend/database-check-create-repair/DatabaseClass.php');
require_once ($rootDir . '/backend/database-check-create-repair/create-languages-table.php');
require_once ($rootDir . '/backend/database-check-create-repair/create-countries-table.php');

/**
 * Main function call, check or create database
 */
function checkDatabase()
{
    $mysqliConnectionDatabaseCheck = new DatabaseClass();
    $queryResultDatabase = $mysqliConnectionDatabaseCheck->dbquery("CREATE DATABASE IF NOT EXISTS " . DBNAME . ";");

    if($queryResultDatabase==1)
    {
        $mysqliConnectionDatabaseCheck->close();

        $GLOBALS['databaseNameValue'] = DBNAME;
        $mysqliConnectionTableCheckExists = new DatabaseClass();
        $queryResultTableExists = $mysqliConnectionTableCheckExists->get_result('DESCRIBE `' . TBNAME . '`;','');
        $tableExists = false;

        if($queryResultTableExists&&strpos($queryResultTableExists,'Error')===false){
            $tableExists = true;
            //here we will proceed to see if the table is formatted correctly, we will compare it with the first
            //column properties dump that is stored at table creation
            $rootDirectory = realpath($_SERVER["DOCUMENT_ROOT"]);
            clearstatcache();
            if(file_exists($rootDirectory . "/application-temporary-data/column-properties-dump.txt")===true)
            {
                $str1=file_get_contents(
                    $rootDirectory . "/application-temporary-data/column-properties-dump.txt");
                $str2=$queryResultTableExists;
                if(strcmp($str1,$str2)!==0){
                    //the database has been changed, this will trigger database backup and repair. In other words,
                    //we will back up the table with all data, delete the table and create it again from the template.
                    //The backups made in this way will be put into recovery-database-backups. To keep it simple, we
                    //will just dump columns names, properties and data in txt format.
                    //That is enough to make a full recovery of the database, albeit not as easily as with .SQL format.

                    $GLOBALS['databaseNameValue'] = DBNAME;
                    $mysqliConnRecoveryDb  = new DatabaseClass();
                    $queryRes = $mysqliConnRecoveryDb->get_result(
                        'DESCRIBE `' . TBNAME . '`;',"\n");

                    if($queryRes&&strpos($queryRes,'Error')===false){
                        $rememberingTableFile = fopen(
                            "recovery-database-backups/" . (time() - APP_START_INT) . ".txt", "w");

                        fwrite($rememberingTableFile, $queryRes);
                        fwrite($rememberingTableFile, "\n\n\n\n");
                        $queryRes = $mysqliConnRecoveryDb->get_result(
                            'SELECT * FROM ' . TBNAME . ';','\n');
                        if(strpos($queryRes,'Error')===false)
                        {
                            fwrite($rememberingTableFile, $queryRes);
                            $mysqliConnRecoveryDb->query(
                                'DROP TABLE IF EXISTS ' . TBNAME . ';');
                            //now that we know we saved data we can drop the table and recreate it
                            $fileSystemIterator = new FilesystemIterator("recovery-database-backups/",
                                FilesystemIterator::SKIP_DOTS);
                            if(iterator_count($fileSystemIterator)>=HOW_MANY_TABLE_BACKUPS)
                            {
                                //finding the smallest value of int in this folder,
                                //in other words the oldest backup file
                                $numberTempMin=0;
                                $minStr="";
                                foreach(glob("recovery-database-backups".'/*.txt') as $smallestFileName) {
                                    $str = str_replace("recovery-database-backups/","",$smallestFileName);
                                    $str = str_replace(".txt","",$str);
                                    if($minStr==""){ //first init
                                        $minStr=$str;
                                        $numberTemp=$minStr;
                                        $numberTempMin=$numberTemp;
                                    }
                                    $numberTemp=$str;
                                    if($numberTemp<$numberTempMin){
                                        $numberTempMin=$numberTemp;
                                    }
                                }

                                //now we delete one oldest file
                                unlink("recovery-database-backups/" . $numberTempMin . ".txt");
                            }
                            initializeTable();
                        }
                        fclose($rememberingTableFile);
                        $mysqliConnRecoveryDb->close();
                    }
                }
            }
            else
            {
                //there are 2 things we can do here: one is to create a new file from existing database, the other is to
                //treat the existing database as broken, we can choose the first option for simplicity now
                storeDatabaseProperties();
            }
        }

        $mysqliConnectionTableCheckExists->close(); //closing

        if($tableExists === false) {
            initializeTable(); //creating columns in the table, with defined data types
        }
    }
    else
    {
        $mysqliConnectionDatabaseCheck->close();
        //error handling
        echo "Error2: " . $queryResultDatabase;
    }
}

/**
 * Checks if the table with the specific name exists
 * @param $nameOfTable
 * @return bool
 */
function checkIfTableExists($nameOfTable){
    $GLOBALS['databaseNameValue'] = DBNAME;
    $mysqliConnTableCheckExists = new DatabaseClass();
    $queryResultTableExistsOrNot = $mysqliConnTableCheckExists->get_result('DESCRIBE `' . $nameOfTable . '`;','');
    $tableExists = false;

    if($queryResultTableExistsOrNot&&strpos($queryResultTableExistsOrNot,'Error')===false)
    {
        $mysqliConnTableCheckExists->close();
        return true;
    }
    else
    {
        $mysqliConnTableCheckExists->close();
        return false;
    }
}

/**
 * Initializes the table named "contacts" and acts as a template
 * for column types in database
 */
function initializeTable()
{
    //checking if all fields are present and of correct type
    $GLOBALS['databaseNameValue'] = DBNAME;
    $mysqliConnectionTableCheck = new DatabaseClass();
    $makeLongQuery = 'CREATE TABLE IF NOT EXISTS `' . TBNAME . '` (';
    $declareFieldsOnMainTable = declareFieldsOnMainTable();
    foreach($declareFieldsOnMainTable->get_allFields() as $oneTableField){
        $makeLongQuery .= "`$oneTableField->asInStoredInDatabase` $oneTableField->databasePropertyType,";
    }
    $makeLongQuery .= ' PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;';
    $queryResultTable = $mysqliConnectionTableCheck->query($makeLongQuery);
    $mysqliConnectionTableCheck->close();
    if ($queryResultTable == 1) {
        //here we will capture the right column properties dump and
        //store it in folder application-temporary-data with name column-properties-dump.txt
        storeDatabaseProperties();
    } else {
        //error handling
        echo "Error1: " . $queryResultTable;
    }
}

/**
 * Stores database column properties to file application-temporary-data/column-properties-dump.txt from current live table
 */
function storeDatabaseProperties(){
    $GLOBALS['databaseNameValue'] = DBNAME;
    $mysqliConnectionRetrievingTableProperties  = new DatabaseClass();
    $queryResultTableProperties = $mysqliConnectionRetrievingTableProperties->get_result(
        'DESCRIBE `' . TBNAME . '`;','');

    if($queryResultTableProperties&&strpos($queryResultTableProperties,'Error')===false){
        $rememberingCorrectColumnProperties = fopen(
            "backend/application-temporary-data/column-properties-dump.txt", "w");

        fwrite($rememberingCorrectColumnProperties, $queryResultTableProperties);
        fclose($rememberingCorrectColumnProperties);
    }
}

/**
 * Adding check if the application is installed and run first time on the machine,
 * to restart counters for database checks.
 */
if (file_exists("backend/application-temporary-data/first-time-run-check.txt") === false) {
    if (file_exists("backend/application-temporary-data/column-properties-dump.txt") === true)
    {
        unlink("backend/application-temporary-data/column-properties-dump.txt");
    }
    if (file_exists("backend/application-temporary-data/counting-number-of-database-checks.txt.txt") === true) {
        unlink("backend/application-temporary-data/counting-number-of-database-checks.txt");
    }

    $firstTimeFile = fopen("backend/application-temporary-data/first-time-run-check.txt", "w");
    fwrite($firstTimeFile, " ");
    fclose($firstTimeFile);
}

/**
 * Main database check function call, checks if the database exists and if it has all the right fields
 */
function allMainChecks(){
    checkDatabase(); //main table - contacts check function
    createLanguagesTable(); //creates languages table
    createCountriesTable(); //creates countries table
}

//logic
if(HOW_MANY_DATABASE_CHECKS!=0) {
    if (file_exists("backend/application-temporary-data/counting-number-of-database-checks.txt") === false) {
        //We have limited number of initial database checks by constant HOW_MANY_DATABASE_CHECKS, here we are initializing
        //that counter in the file counting-number-of-database-checks.txt
        $rememberingNumberOfChecks = fopen(
            "backend/application-temporary-data/counting-number-of-database-checks.txt", "w");
        fwrite($rememberingNumberOfChecks, 1);
        fclose($rememberingNumberOfChecks);
        //checking if database and table exists, as well as if it's corrupted.
        allMainChecks();
    } else {
        $numberOfChecks=0;
        $numberOfChecks=file_get_contents("backend/application-temporary-data/counting-number-of-database-checks.txt");
        if($numberOfChecks<HOW_MANY_DATABASE_CHECKS){
            $numberOfChecks++;
            $rememberingNumberOfChecks = fopen(
                "backend/application-temporary-data/counting-number-of-database-checks.txt", "w");
            fwrite($rememberingNumberOfChecks, $numberOfChecks);
            fclose($rememberingNumberOfChecks);
            allMainChecks();
        }
    }
}