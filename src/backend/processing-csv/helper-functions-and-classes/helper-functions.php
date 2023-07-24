<?php

function getIntFromLanguages($langStr):int
{
    if($langStr==""){
        return -1;
    }
    $mysqliConnectionSelectLanguages = new DatabaseClassProc();
    $resultsLanguages = $mysqliConnectionSelectLanguages->get_result_as_array("SELECT * FROM " . LANGUAGES_TBNAME);

    foreach($resultsLanguages as $language){
        $databaseFields= explode("|",$language);
        foreach($databaseFields as $field){
            if(strtolower($langStr) ==strtolower($field)){
                return $databaseFields[0];
            }
        }
    }

    return -1;
}

function isEmptyAndReturn($key,$array):string
{
    if(!isset($array)){
        return "";
    }
    if(!isset($key)){
        return "";
    }

    if($array==false)
    {
        return "";
    }
    if(array_key_exists($key,$array))
    {
        return $array[$key];
    }
    return "";
}

function customArrayHasMember($member,$item):bool
{
    if(substr($item,0,strpos($item,"|"))==$member){
        return true;
    }
    else
    {
        return false;
    }
}

function getSecondPart($item)
{
    return substr($item,strpos($item,"|")+1);
}

function strip($inputStr):string
{
    return trim($inputStr," \n\r\t\v\x00\"'");
}

function getCountryIntFromString($countriesArray,$compareIt):int
{
    if($compareIt==""){
        return 0;
    }
    $counter = 1;
    foreach ($countriesArray as $country){
        if(doesItContain(strtolower($country),strtolower($compareIt)))
        {
            return $counter;
        }
        $counter++;
    }

    $counter = 1;
    $shortest = 100;
    $closest="Deutschland";
    // loop through words to find the closest
    foreach ($countriesArray as $country) {
        // calculate the distance between the input word,
        // and the current word
        $lev1 = levenshtein(strtolower($compareIt), strtolower(substr($country,0,strpos($country,","))));
        $lev2 = levenshtein(strtolower($compareIt), strtolower(substr($country,strpos($country,",")+1)));

        if($lev1<=$lev2) {
            // check for an exact match
            if ($lev1 == 0) {
                // closest word is this one (exact match)
                return $counter;
            }

            // if this distance is less than the next found shortest
            // distance, OR if a next shortest word has not yet been found
            if ($lev1 <= $shortest || $shortest < 0) {
                // set the closest match, and shortest distance
                $closest = $counter;
                $shortest = $lev1;
            }
        }
        else{
            // check for an exact match
            if ($lev2 == 0) {
                // closest word is this one (exact match)
                return $counter;
            }

            // if this distance is less than the next found shortest
            // distance, OR if a next shortest word has not yet been found
            if ($lev2 <= $shortest || $shortest < 0) {
                // set the closest match, and shortest distance
                $closest = $counter;
                $shortest = $lev2;
            }
        }
        $counter++;
    }
    return $closest;
}

function indexArrayFunction($indexWhat):array
{
    $result = array();
    $counter = 0;
    $previousChar='';
    foreach ($indexWhat as $itemInArray){
        if($previousChar!=$itemInArray[0]){
            $previousChar=$itemInArray[0];
            $result[$itemInArray[0]] = $counter;
        }
        $counter++;
    }
    return $result;
}
function indexLastArrayFunction($indexWhat):array
{
    $result = array();
    $counter = 0;
    $previousChar='';
    $stringResults="";
    $allChars="";
    foreach ($indexWhat as $itemInArray){
        if($previousChar!=$itemInArray[0]){
            $previousChar=$itemInArray[0];
        }
        $allChars .= $itemInArray[0];
        $stringResults.=$itemInArray[0];
    }
    for($count=0;$count<strlen($allChars);$count++){
        $result[$allChars[$count]] = strrpos($allChars,$allChars[$count]);
    }
    return $result;
}
function isTheEmailExisting($emailStr,$allEmails,$charStartIndex,$charEndIndex):bool
{
    if($allEmails==""){
        return false;
    }
    if(array_key_exists($emailStr[0],$charStartIndex))
    {
        $charStartIndexLocal=$charStartIndex[$emailStr[0]];
    }
    else
    {
        $charStartIndexLocal=0;
    }

    if(array_key_exists($emailStr[0],$charEndIndex))
    {
        $charEndIndexLocal = $charEndIndex[$emailStr[0]];
    }
    else
    {
        $charEndIndexLocal=count($allEmails);
    }
    /*$countAllEmails = count($allEmails);
    for($counter=0;$counter<$countAllEmails;$counter++){
        if(strip($allEmails[$counter])==strip($emailStr)){
            return true;
        }
    }*/
    for($counter=$charStartIndexLocal;$counter<$charEndIndexLocal;$counter++){
        if($allEmails[$counter]==$emailStr){
            return true;
        }
    }
    return false;
}

function getDateOfBirthIntBasedOnString($inputDate):int
{
    $day="";
    $month="";
    $year="";

    $arrayDate = array();
    $localInputDate = $inputDate;
    $localInputDate = trim($localInputDate);
    if(doesItContain($localInputDate,".")){
        $arrayDate = explode(".",$localInputDate);
    }
    else if(doesItContain($localInputDate,"/")){
        $arrayDate = explode("/",$localInputDate);
    }
    else if(doesItContain($localInputDate,"-")){
        $arrayDate = explode("-",$localInputDate);
    }
    else if(doesItContain($localInputDate," ")){
        $arrayDate = explode(" ",$localInputDate);
    }
    $arrayDateLen = count($arrayDate);
    $itAssigned = false;
    for ($count = 0;$count < $arrayDateLen;$count++) {
        $arrayDate[$count] = trim($arrayDate[$count]);
        if (strlen($arrayDate[$count]) == 4) {
            $year = $arrayDate[$count];
            $itAssigned = true;
        } else if (strlen($arrayDate[$count]) <= 2) {
            if (intval($arrayDate[$count]) > 35) {
                $year = "19" . $arrayDate[$count];
                $itAssigned = true;
            } else {
                if (intval($arrayDate[$count]) < 32 && intval($arrayDate[$count]) > 12) {
                    $day = $arrayDate[$count];
                    $itAssigned = true;
                } else {
                    if ($count == 0 && $day == "") {
                        $day = $arrayDate[$count];
                        $itAssigned = true;
                    }
                    else{
                            $month = $arrayDate[$count];
                            $itAssigned = true;
                        }
                    }
                }
            }
        if($itAssigned == false){
            if($day="")
            {
                $day = $arrayDate[$count];
            }
            else if($month="")
            {
                $month = $arrayDate[$count];
            }
            else if($year="")
            {
                $year = $arrayDate[$count];
            }
        }
        $itAssigned = false;
    }
    if($day=="")
    {
        $day = "1";
    }
    if($month=="")
    {
        $month = "1";
    }
    if($year=="")
    {
        $year = "1995";
    }

    $res = strtotime($day . "-" .  $month . "-" .  $year);

    if($res!==false){
        return $res;
    }
    else
    {
        return 0;
    }
}


/**
 * Retrieve arbitrary id, marking the order of database fields
 * @param $fieldName
 * @return int
 */
function retrieveDatabasePositionIdFromDatabaseFieldName($fieldName):int
{
    $MainTableObjects = declareFieldsOnMainTable();
    foreach ($MainTableObjects->get_allFields() as $oneTableField)
    {
        if($oneTableField->asInStoredInDatabase==$fieldName)
        {
            return $oneTableField->numberIdPosition;
        }
    }
    return 0;
}

/**
 * Check if any line delimiter shows up more than one tested.
 * @param $counterOccurrences
 * @param $delimiter
 * @param $input
 * @return string|void
 */
function findLineDelimiterBonusRecursion($counterOccurrences, $delimiter, $input)
{
    //+3 is to make sure it is not just in the end of the file
    if(substr_count(PHP_EOL,$input)>$counterOccurrences+3)
    {
        return PHP_EOL;
    }
    else if(substr_count("\r\n",$input)>$counterOccurrences+3)
    {
        return "\r\n";
    } //if both PHP_EOL and \r\n aren't bigger than one another then we try with \n and \r individually
    else{
        if(substr_count("\n",$input)>$counterOccurrences+3)
        {
            return "\n";
        }
        if(substr_count("\r",$input)>$counterOccurrences+3)
        {
            return "\r";
        }
    }
    return $delimiter;
}

/**
 * Finds main line delimiter in the CSV
 * @param $input
 * @return string|void
 */
function findLineDelimiter($input)
{
    if(doesItContain($input,PHP_EOL))
    {
        return findLineDelimiterBonusRecursion(substr_count($input,PHP_EOL),PHP_EOL,$input);
    }
    else if(doesItContain($input,"\r\n"))
    {
        return findLineDelimiterBonusRecursion(substr_count($input,"\r\n"),"\r\n",$input);
    }
    else if(doesItContain($input,"\n"))
    {
        return findLineDelimiterBonusRecursion(substr_count($input,"\n"),"\n",$input);
    }
    else if(doesItContain($input,"\r"))
    {
        return findLineDelimiterBonusRecursion(substr_count($input,"\r"),"\r",$input);
    }

    return PHP_EOL;
}


/**
 * Function made to return main delimiter
 */
function ReturnMainCsvDelimiter($input):string
{
    $semiCount = substr_count($input,";");
    $commaCount = substr_count($input,",");
    $pipeCount = substr_count($input,"|");

    if(doesItContain($input,";")&&$semiCount>$commaCount&&$semiCount>$pipeCount)
    {
        return ";";
    }
    if(doesItContain($input,",")&&$commaCount>$semiCount&&$commaCount>$pipeCount)
    {
        return ",";
    }
    if(doesItContain($input,"|")&&$pipeCount>$semiCount&&$pipeCount>$commaCount)
    {
        return "|";
    }
    //one more check, without conditions if they make error by mistake
    if(doesItContain($input,";"))
    {
        return ";";
    }
    if(doesItContain($input,","))
    {
        return ",";
    }
    if(doesItContain($input,"|"))
    {
        return "|";
    }

    if(doesItContain($input,"\t"))
    {
        return "\t";
    }
    if(doesItContain($input,"."))
    {
        return ".";
    }
    //last resort
    return " ";
}