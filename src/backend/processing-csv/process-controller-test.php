<?php
require_once("../config.php");
require_once("../common-php-functions/common-functions.php");
require_once("DatabaseClassProc.php");
require_once("detectAndSortCSVcolumns.php");
require_once("helper-functions-and-classes/helper-functions.php");
require_once("helper-functions-and-classes/countries-array.php");
require_once("helper-functions-and-classes/FindLanguagesSeparator.php");


$mysqliConnectionUpdate = new DatabaseClassProc();
$mysqliConnectionUpdate->multi_query("START TRANSACTION; UPDATE `contacts_m` SET `salutation`='OTHER3' WHERE `email`='dw@w3work.de'; UPDATE `contacts_m` SET `salutation`='OTHER4' WHERE `email`='ds@w3work.de'; COMMIT;");
if ($res = $mysqliConnectionUpdate->store_result()) {
    $res->free();
}

$mysqliConnectionUpdate->close();
$mysqliConnectionUpdate = new DatabaseClassProc();
$mysqliConnectionUpdate->multi_query("START TRANSACTION; UPDATE `contacts_m` SET `salutation`='OTHER3' WHERE `email`='dw@w3work.de'; UPDATE `contacts_m` SET `salutation`='OTHER4' WHERE `email`='ds@w3work.de'; COMMIT;");


$mysqliConnectionUpdate->close();
