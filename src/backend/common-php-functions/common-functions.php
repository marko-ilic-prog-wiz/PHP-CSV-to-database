<?php

/**
 * Function to check if subject contains the needle
 * @param $subject
 * @param $needle
 * @return bool
 */
function doesItContain($subject,$needle): bool
{
    /** Use of strpos instead of str_contains for backward compatibility**/
    if(strpos($subject, $needle) !== false){
        return true;
    } else{
        return false;
    }
}

/**
 * Delete all occurrences of unnecessary characters below 1F in ASCII
 */
function sanitizeInput($inputString)
{
    return preg_replace('/[\x00-\x1F]/', '', $inputString);
}


/**
 * Writing to error log file
 */
function writeToErrorLog($inputString)
{
    $rootDirectory = realpath($_SERVER["DOCUMENT_ROOT"]);
    if(file_exists($rootDirectory . "/backend/application-temporary-data/errorLog.txt") === false) {
        $streamErrorLog = fopen(
            $rootDirectory . "/backend/application-temporary-data/errorLog.txt", "w");
        fwrite($streamErrorLog, $inputString);
        fclose($streamErrorLog);
    } else {
        $previousLogs=file_get_contents($rootDirectory . "/backend/application-temporary-data/errorLog.txt");
        $streamErrorLog = fopen(
            $rootDirectory . "/backend/application-temporary-data/errorLog.txt", "w");
        fwrite($streamErrorLog, $previousLogs .
            "\n\n\n\n|||||||||||||||||||||||||||||||||||||\n|||||||||||||||||||||||||||||||||||||\n\n" .
            $inputString);
        fclose($streamErrorLog);
    }
}

/**
 * Writing to debug file
 */
function writeToDebug($inputString)
{
    $rootDirectory = realpath($_SERVER["DOCUMENT_ROOT"]);
    if(file_exists($rootDirectory . "/backend/application-temporary-data/debug.txt") === false) {
        $streamDebug = fopen(
            $rootDirectory . "/backend/application-temporary-data/debug.txt", "w");
        fwrite($streamDebug, $inputString);
        fclose($streamDebug);
    } else {
        $previousLogs=file_get_contents($rootDirectory . "/backend/application-temporary-data/debug.txt");
        $streamDebug = fopen(
            $rootDirectory . "/backend/application-temporary-data/debug.txt", "w");
        fwrite($streamDebug, $previousLogs .
            "\n\n\n\n|||||||||||||||||||||||||||||||||||||\n|||||||||||||||||||||||||||||||||||||\n\n" .
            $inputString);
        fclose($streamDebug);
    }
}