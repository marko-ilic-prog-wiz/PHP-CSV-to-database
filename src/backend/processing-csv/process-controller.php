<?php
require_once("../config.php");
require_once("../common-php-functions/common-functions.php");
require_once("DatabaseClassProc.php");
require_once("detectAndSortCSVcolumns.php");
require_once("helper-functions-and-classes/helper-functions.php");
require_once("helper-functions-and-classes/countries-array.php");
require_once("helper-functions-and-classes/FindLanguagesSeparator.php");

/**
 * Master insert and update function
 * @param $input
 * @param $checkForDuplicates
 * @return string
 *
 */
function importCsvIntoDatabase($input, $checkForDuplicates)
{
    $returnValue = "";
    $mainDelimiter = ReturnMainCsvDelimiter($input);
    $lines = explode(findLineDelimiter($input), $input);

    $csvHead = $lines[0];
    $csvBody = array();
    $rowCount=0;
    foreach (array_slice($lines, 1) as $line) {
        $csvBody[$rowCount] = explode($mainDelimiter,$line);
        $rowCount++;
    }

    

    //This variable $arrayOfPositions keeps:
    //1. Which fields should be written to database
    //2. What fields from the CSV go to what fields in the database
    $arrayOfPositions = detectAndSortCSVcolumns($csvHead,$mainDelimiter);

    $mysqliConnectionInsert = new DatabaseClassProc();

    $getFields = declareFieldsOnMainTable();
    //UPDATE contacts_m SET email="changed" WHERE email="ab@w3work.de";
    $arrayOfExistingEmailsProcessed = array();
    $arrayOfExistingEmails = $mysqliConnectionInsert->get_result_as_array("SELECT email FROM " . TBNAME);
    if($arrayOfExistingEmails!==NULL&&count($arrayOfExistingEmails)!=0){
        $arrayOfExistingEmails = array_map('strtolower', $arrayOfExistingEmails);
        $arrayOfExistingEmailsProcessed = array();
        foreach ($arrayOfExistingEmails as $email){
            $arrayOfExistingEmailsProcessed[] = strip($email);
        }

        sort($arrayOfExistingEmailsProcessed);

        $indexArray = indexArrayFunction($arrayOfExistingEmailsProcessed);
        $indexLastArray = indexLastArrayFunction($arrayOfExistingEmailsProcessed);
    }

    $mysqliConnectionInsert->dbquery("START TRANSACTION");
    $onlyOnce1 = true; //first part of INSERT statement
    $onlyOnce2 = true; //second part of INSERT statement
    $madeItToInsert = false;
    $madeItToUpdate = false;
    $countUpdateRows = 0;
    $countInsertRows = 0;

    $totalCountUpdateRows = 0;
    $totalCountInsertRows = 0;

    $makeLongQuery = "";
    $globalUpdate="";
    for($countRows=0;$countRows<count($csvBody);$countRows++) {
        if($onlyOnce1){
            $onlyOnce1 = false;

            $makeLongQuery = 'INSERT INTO ' . TBNAME;
            $makeLongQuery .=' (';
            foreach($getFields->get_allFields() as $oneTableField){
                if($oneTableField->numberIdPosition!=0)
                {
                    $makeLongQuery .= "`$oneTableField->asInStoredInDatabase`,";
                }
            }

            $makeLongQuery = substr($makeLongQuery,0,strlen($makeLongQuery)-1);

            $makeLongQuery .= ') VALUES ';
        }

        $isEmpty = true;
        foreach ($csvBody[$countRows] as $item1)
        {
            if($item1!=""){
                $isEmpty=false;
            }
        }

        if(!$isEmpty) {
            $updateThisTableRow = false;
            $localUpdate = "UPDATE `" . TBNAME . "` SET ";
            $localUpdateWhere = "";
            $localInsert = "";

            //UPDATE contacts_m SET email="changed" WHERE email="ab@w3work.de";

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $date = date('y-m-d h:i:s');
            /**1 creation_time**/
            $localInsert .= '("' . $date . '",';
            /**2 modification_time**/
            $localInsert .= '"' . $date . '",';
            $localUpdate .= '`' . $getFields->get_allFields()[2]->asInStoredInDatabase . '`="' . $date . '",';
            /**3 salutation**/
            $incrementFields = 3;
            $arrayOfPositionsInc = 0;
            if (array_key_exists($arrayOfPositionsInc, $arrayOfPositions) && customArrayHasMember($incrementFields, $arrayOfPositions[$arrayOfPositionsInc])) {
                $partInt = getSecondPart($arrayOfPositions[$arrayOfPositionsInc]);
                $localInsert .= "\"" . strip($csvBody[$countRows][$partInt]) . "\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' . strip($csvBody[$countRows][$partInt]) . '",';
                $arrayOfPositionsInc++;
            } else {
                $localInsert .= "\"\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="",';
            }
            /**4 first_name**/
            $incrementFields++;
            if (array_key_exists($arrayOfPositionsInc, $arrayOfPositions) && customArrayHasMember($incrementFields, $arrayOfPositions[$arrayOfPositionsInc])) {
                $partInt = getSecondPart($arrayOfPositions[$arrayOfPositionsInc]);
                $localInsert .= "\"" . strip($csvBody[$countRows][$partInt]) . "\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' . strip($csvBody[$countRows][$partInt]) . '",';
                $arrayOfPositionsInc++;
            } else {
                $localInsert .= "\"\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="",';
            }
            /**5 last_name**/
            $incrementFields++;
            if (array_key_exists($arrayOfPositionsInc, $arrayOfPositions) && customArrayHasMember($incrementFields, $arrayOfPositions[$arrayOfPositionsInc])) {
                $partInt = getSecondPart($arrayOfPositions[$arrayOfPositionsInc]);
                $localInsert .= "\"" . strip($csvBody[$countRows][$partInt]) . "\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' . strip($csvBody[$countRows][$partInt]) . '",';
                $arrayOfPositionsInc++;
            } else {
                $localInsert .= "\"\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="",';
            }
            /**6 date_of_birth_string**/
            $incrementFields++;
            if (array_key_exists($arrayOfPositionsInc, $arrayOfPositions) && customArrayHasMember($incrementFields, $arrayOfPositions[$arrayOfPositionsInc])) {
                $partInt = getSecondPart($arrayOfPositions[$arrayOfPositionsInc]);
                $localInsert .= "\"" . strip($csvBody[$countRows][$partInt]) . "\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' . strip($csvBody[$countRows][$partInt]) . '",';
                $arrayOfPositionsInc++;
            } else {
                $localInsert .= "\"\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="",';
            }
            /**7 date_of_birth_int**/
            $incrementFields++;
            if (array_key_exists($arrayOfPositionsInc - 1, $arrayOfPositions) && customArrayHasMember(($incrementFields - 1), $arrayOfPositions[$arrayOfPositionsInc - 1])) {
                $partInt = getSecondPart($arrayOfPositions[$arrayOfPositionsInc - 1]);
                $localInsert .= getDateOfBirthIntBasedOnString(strip($csvBody[$countRows][$partInt])) . ",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' . getDateOfBirthIntBasedOnString(strip($csvBody[$countRows][$partInt])) . ',';
            } else {
                $localInsert .= "\"-1\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=-1,';
            }
            /**8 country**/
            $incrementFields++;
            if (array_key_exists($arrayOfPositionsInc, $arrayOfPositions) && customArrayHasMember($incrementFields, $arrayOfPositions[$arrayOfPositionsInc])) {
                $partInt = getSecondPart($arrayOfPositions[$arrayOfPositionsInc]);
                $localInsert .= "\"" . strip($csvBody[$countRows][$partInt]) . "\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' . strip($csvBody[$countRows][$partInt]) . '",';
                $arrayOfPositionsInc++;
            } else {
                $localInsert .= "\"\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="",';
            }

            /**9 country_int**/
            $incrementFields++;
            if (array_key_exists($arrayOfPositionsInc - 1, $arrayOfPositions) && customArrayHasMember(($incrementFields - 1), $arrayOfPositions[$arrayOfPositionsInc - 1])) {
                $partInt = getSecondPart($arrayOfPositions[$arrayOfPositionsInc - 1]);
                $countriesArray1 = getCountriesArray();
                $intCountry = getCountryIntFromString($countriesArray1, strip($csvBody[$countRows][$partInt]));
                $localInsert .= $intCountry . ",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' . $intCountry . ',';
            } else {
                $localInsert .= "0,";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=0,';
            }
            /**10 email**/
            $incrementFields++;
            if (array_key_exists($arrayOfPositionsInc, $arrayOfPositions) && customArrayHasMember($incrementFields, $arrayOfPositions[$arrayOfPositionsInc])) {
                $partInt = getSecondPart($arrayOfPositions[$arrayOfPositionsInc]);
                if (count($arrayOfExistingEmailsProcessed) == 0) {
                    $updateThisTableRow = false;
                } else if ($checkForDuplicates == 1 && isTheEmailExisting(strip($csvBody[$countRows][$partInt]), $arrayOfExistingEmailsProcessed, $indexArray, $indexLastArray)) {
                    $updateThisTableRow = true;
                }
                $localInsert .= "\"" . strip($csvBody[$countRows][$partInt]) . "\",";
                $localUpdateWhere = " WHERE `email`=\"" . strip($csvBody[$countRows][$partInt]) . "\"";
                $arrayOfPositionsInc++;
            } else {
                $localInsert .= "\"\",";
            }
            /**11 phone_number**/
            $incrementFields++;
            if (array_key_exists($arrayOfPositionsInc, $arrayOfPositions) && customArrayHasMember($incrementFields, $arrayOfPositions[$arrayOfPositionsInc])) {
                $partInt = getSecondPart($arrayOfPositions[$arrayOfPositionsInc]);
                $localInsert .= "\"" . strip($csvBody[$countRows][$partInt]) . "\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' . strip($csvBody[$countRows][$partInt]) . '",';
                $arrayOfPositionsInc++;
            } else {
                $localInsert .= "\"\",";
                $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="",';
            }
            /**Language**/
            $languagesArray = array();
            $incrementFields++;
            if (array_key_exists($arrayOfPositionsInc, $arrayOfPositions) && customArrayHasMember($incrementFields, $arrayOfPositions[$arrayOfPositionsInc])) {
                $partInt = getSecondPart($arrayOfPositions[$arrayOfPositionsInc]);
                $languageField = strip($csvBody[$countRows][$partInt]);
                if (ctype_alpha($languageField)) {
                    if ($languageField != "") {
                        $languagesArray[] = $languageField;
                    }
                } else {
                    if ($languageField != "") {
                        $findLanguagesSeparator = new FindLanguagesSeparator();
                        $separator = $findLanguagesSeparator::get($languageField);
                        $languagesArray = explode($separator, $languageField);
                    }
                }
                $arrayOfPositionsInc++;
            }
            $incrementLanguages = 0;
            /**12 language1_string**/
            $localInsert .= "\"" . isEmptyAndReturn($incrementLanguages, $languagesArray) . "\",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' .
                isEmptyAndReturn($incrementLanguages, $languagesArray) . '",';
            /**13 language1_int**/
            $incrementFields++;
            $localInsert .= getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' .
                getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ',';
            $incrementLanguages++;
            /**14 language2_string**/
            $incrementFields++;
            $localInsert .= "\"" . isEmptyAndReturn($incrementLanguages, $languagesArray) . "\",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' .
                isEmptyAndReturn($incrementLanguages, $languagesArray) . '",';
            /**15 language2_int**/
            $incrementFields++;
            $localInsert .= getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' .
                getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ',';
            $incrementLanguages++;
            /**16 language3_string**/
            $incrementFields++;
            $localInsert .= "\"" . isEmptyAndReturn($incrementLanguages, $languagesArray) . "\",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' .
                isEmptyAndReturn($incrementLanguages, $languagesArray) . '",';
            /**17 language3_int**/
            $incrementFields++;
            $localInsert .= getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' .
                getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ',';
            $incrementLanguages++;
            /**18 language4_string**/
            $incrementFields++;
            $localInsert .= "\"" . isEmptyAndReturn($incrementLanguages, $languagesArray) . "\",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' .
                isEmptyAndReturn($incrementLanguages, $languagesArray) . '",';
            /**19 language4_int**/
            $incrementFields++;
            $localInsert .= getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' .
                getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ',';
            $incrementLanguages++;
            /**20 language5_string**/
            $incrementFields++;
            $localInsert .= "\"" . isEmptyAndReturn($incrementLanguages, $languagesArray) . "\",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' .
                isEmptyAndReturn($incrementLanguages, $languagesArray) . '",';
            /**21 language5_int**/
            $incrementFields++;
            $localInsert .= getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' .
                getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ',';
            $incrementLanguages++;
            /**22 language6_string**/
            $incrementFields++;
            $localInsert .= "\"" . isEmptyAndReturn($incrementLanguages, $languagesArray) . "\",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' .
                isEmptyAndReturn($incrementLanguages, $languagesArray) . '",';
            /**23 language6_int**/
            $incrementFields++;
            $localInsert .= getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' .
                getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ',';
            $incrementLanguages++;
            /**24 language7_string**/
            $incrementFields++;
            $localInsert .= "\"" . isEmptyAndReturn($incrementLanguages, $languagesArray) . "\",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' .
                isEmptyAndReturn($incrementLanguages, $languagesArray) . '",';
            /**25 language7_int**/
            $incrementFields++;
            $localInsert .= getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' .
                getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ',';
            $incrementLanguages++;
            /**26 language8_string**/
            $incrementFields++;
            $localInsert .= "\"" . isEmptyAndReturn($incrementLanguages, $languagesArray) . "\",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`="' .
                isEmptyAndReturn($incrementLanguages, $languagesArray) . '",';
            /**27 language8_int**/
            $incrementFields++;
            $localInsert .= getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ",";
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' .
                getIntFromLanguages(isEmptyAndReturn($incrementLanguages, $languagesArray)) . ',';
            /**28**/
            $incrementFields++;
            $localInsert .= (time() - APP_START_INT) . ',';
            /**29**/
            $incrementFields++;
            $localInsert .= (time() - APP_START_INT);
            $localUpdate .= '`' . $getFields->get_allFields()[$incrementFields]->asInStoredInDatabase . '`=' . (time() - APP_START_INT) . '';
            $localInsert .= "),";
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if ($updateThisTableRow) {
                $localUpdate .= $localUpdateWhere . ";";
                $globalUpdate .= " " . $localUpdate;
                $countUpdateRows++;
                $totalCountUpdateRows++;
            } else {
                $makeLongQuery .= $localInsert;
                $countInsertRows++;
                $totalCountInsertRows++;
            }

            if ($countUpdateRows > 1000) {
                writeToDebug($countUpdateRows);
                $madeItToUpdate = true;
                $countUpdateRows = 0;
                $mysqliConnectionUpdate1 = new DatabaseClassProc();
                $mysqliConnectionUpdate1->multi_query("START TRANSACTION; " . $globalUpdate . " COMMIT;");
                $mysqliConnectionUpdate1->close();
                $globalUpdate = "";
            }

            //Handling of big inserts, was made via insert chunking by 1000
            if (doesItContain($makeLongQuery,"VALUES (")&&$countRows != 0 && ($countInsertRows + 1) % 1000 == 0) {
                $madeItToInsert = true;
                $onlyOnce1 = true;
                $makeLongQuery = trim($makeLongQuery, ",");
                $mysqliConnectionInsert->dbquery($makeLongQuery);
            }

            if (doesItContain($makeLongQuery,"VALUES (")&&$countRows != 0 && !$madeItToInsert && $countRows + 1 == (count($csvBody)) && $onlyOnce2) {
                $madeItToInsert = true;
                $onlyOnce2 = false;
                $makeLongQuery = trim($makeLongQuery, ",");
                $mysqliConnectionInsert->dbquery($makeLongQuery);
            }
        }
    }
    if($makeLongQuery!=""&&doesItContain($makeLongQuery,"VALUES (")&&$countRows != 0 &&!$madeItToInsert){
        $makeLongQuery = trim($makeLongQuery,",");
        $mysqliConnectionInsert->dbquery($makeLongQuery);
    }
    if($countUpdateRows!= 0 && !$madeItToUpdate&&$globalUpdate!=""){
        $mysqliConnectionUpdate2 = new DatabaseClassProc();
        $mysqliConnectionUpdate2->multi_query("START TRANSACTION; " . $globalUpdate . " COMMIT;");
        $mysqliConnectionUpdate2->close();
    }

    $mysqliConnectionInsert->dbquery("COMMIT;");

    $mysqliConnectionInsert->close();

    $returnValue.='Inserted '  . $totalCountInsertRows . ' rows and updated ' .  $totalCountUpdateRows . ' rows.';
    return $returnValue;
}
//importCsvIntoDatabase(file_get_contents("../uploaded-csv-files/data_1000.csv"),1);