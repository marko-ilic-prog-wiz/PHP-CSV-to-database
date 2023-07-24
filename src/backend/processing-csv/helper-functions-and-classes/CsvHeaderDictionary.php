<?php
require_once("csv-header-dictionary.php");

class CsvHeaderDictionary
{
    private $specificLanguageDictionariesCombined = array();

    public function __construct() {
        $this->specificLanguageDictionariesCombined[] = returnEnglishDictionary();
        $this->specificLanguageDictionariesCombined[] = returnGermanDictionary();
    }

    function set_specificLanguageDictionariesCombined($specificLanguageDictionariesCombined)
    {
        $this->specificLanguageDictionariesCombined = $specificLanguageDictionariesCombined;
    }

    function get_specificLanguageDictionariesCombined()
    {
        return $this->specificLanguageDictionariesCombined;
    }
}