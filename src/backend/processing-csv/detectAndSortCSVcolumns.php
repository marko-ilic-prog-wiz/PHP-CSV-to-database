<?php

require_once("../common-php-functions/common-functions.php");
include("helper-functions-and-classes/CsvHeaderDictionary.php");

function checkIfHeaderExistsInDatabaseAndReturnPosition($oneHeaderItemStr)
{
    $dictionary = new CsvHeaderDictionary();
    foreach ($dictionary->get_specificLanguageDictionariesCombined() as $langDict)
    {
        foreach ($langDict->items as $item){
            if(str_replace(array('.',',','-','_','|','/'), '',preg_replace('/\s+/', '', strtolower($item->value)))===
                str_replace(array('.',',','-','_','|','/'), '',preg_replace('/\s+/', '', strtolower($oneHeaderItemStr)))){
                return $item->mainPositionInDatabase;
            }
        }
    }
    return -1;
}

/**
 * Returns an array of strings, which in custom encoding make a linked list that signifies
 * which position of header, goes to which column in the database. Skipped positions will be ignored.
 * @param $CSV_header String
 * @param $delimiter String
 * @return array
 */
function detectAndSortCSVcolumns($CSV_header,$delimiter){
    $arrayOfSortedPositions = [];
    $notSortedPositions = [];

    $notSortedPositions = explode($delimiter,sanitizeInput($CSV_header));
    $keepTrackOfCurrentUnsortedPosition = 0;
    foreach ($notSortedPositions as $oneHeaderItem)
    {
        $oneHeaderItemStr = trim($oneHeaderItem," \n\r\t\v\x00\"'|/"); //firstName
        $returnPosition = checkIfHeaderExistsInDatabaseAndReturnPosition($oneHeaderItemStr);
        if($returnPosition!=-1){
            $arrayOfSortedPositions[] =  $returnPosition. "|" . $keepTrackOfCurrentUnsortedPosition;
        }
        $keepTrackOfCurrentUnsortedPosition++;
    }

    for($i=0; $i<count($arrayOfSortedPositions)-1; $i++)
    {
        for($j=0; $j<count($arrayOfSortedPositions)-1; $j++)
        {
            if(substr($arrayOfSortedPositions[$j],0,strpos($arrayOfSortedPositions[$j],"|"))
                > substr($arrayOfSortedPositions[$j+1],0,strpos($arrayOfSortedPositions[$j+1],"|"))){
                $temp = $arrayOfSortedPositions[$j+1];
                $arrayOfSortedPositions[$j+1]= $arrayOfSortedPositions[$j];
                $arrayOfSortedPositions[$j]= $temp;
            }
        }
    }

    return $arrayOfSortedPositions;
}
