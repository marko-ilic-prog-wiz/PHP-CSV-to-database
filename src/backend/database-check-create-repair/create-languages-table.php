<?php
function createLanguagesTable()
{
    if(!checkIfTableExists(LANGUAGES_TBNAME)){
        $GLOBALS['databaseNameValue'] = DBNAME;
        $mysqliConnLangTable = new DatabaseClass();
        $makeLongQuery = 'CREATE TABLE IF NOT EXISTS ' . LANGUAGES_TBNAME;
        $makeLongQuery .= ' ( `id_lan` bigint NOT NULL AUTO_INCREMENT,';
        $makeLongQuery .= '`iso639_1` varchar(8),';
        $makeLongQuery .= '`iso639_2t` varchar(8),';
        $makeLongQuery .= '`name_en` varchar(100),';
        $makeLongQuery .= '`name_de` varchar(100),';
        $makeLongQuery .= '`name_it` varchar(100),';
        $makeLongQuery .= '`name_es` varchar(100),';
        $makeLongQuery .= '`name_fr` varchar(100),';
        $makeLongQuery .= '`name_ru` varchar(100),';
        $makeLongQuery .= '`dictionary` text,';
        $makeLongQuery .= 'PRIMARY KEY (`id_lan`)) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;';
        $queryResultTable = $mysqliConnLangTable->dbquery($makeLongQuery);
        $mysqliConnLangTable->close();
    }
    if(checkIfTableExists(LANGUAGES_TBNAME)){
        $GLOBALS['databaseNameValue'] = DBNAME;
        $mysqliConnLangTable = new DatabaseClass();
        $queryResultTable = $mysqliConnLangTable->get_result('SELECT COUNT(*) FROM ' . LANGUAGES_TBNAME . ';',"\n");
        $mysqliConnLangTable->close();
        if($queryResultTable==="0"){
            //here we will insert the languages table data
            $masterLanguagesQuery = "INSERT INTO " . LANGUAGES_TBNAME ." (";
            $masterLanguagesQuery .= "`iso639_1`,";
            $masterLanguagesQuery .= "`iso639_2t`,";
            $masterLanguagesQuery .= "`name_en`,";
            $masterLanguagesQuery .= "`name_de`,";
            $masterLanguagesQuery .= "`name_it`,";
            $masterLanguagesQuery .= "`name_es`,";
            $masterLanguagesQuery .= "`name_fr`,";
            $masterLanguagesQuery .= "`name_ru`,";
            $masterLanguagesQuery .= "`dictionary`";
            $masterLanguagesQuery .= ") VALUES ";

            $masterLanguagesQuery .='("ab","abk","Abkhazian","Abkhazian","Abkhazian","Abĥaza","Abkhaze","Абхазька",""),';
            $masterLanguagesQuery .='("en","eng","English","Englisch","Inglese","English","English","English",""),';
            $masterLanguagesQuery .='("de","deu","German","Deutsch","Tedesco","German","German","German",""),';
            $masterLanguagesQuery .='("it","ita","Italian","Italienisch","Italiano","Italian","Italian","Italian",""),';
            $masterLanguagesQuery .='("es","spa","Spanish","Spanisch","Spagnolo","Spanish","Spanish","Spanish",""),';
            $masterLanguagesQuery .='("fr","fra","French","Französisch","Francese","French","French","French",""),';
            $masterLanguagesQuery .='("ru","rus","Russian","Russisch","Russo","Russian","Russian","Russian","");';

            $GLOBALS['databaseNameValue'] = DBNAME;
            $mysqliConnLangInsert = new DatabaseClass();
            $mysqliConnLangInsert->query($masterLanguagesQuery);
            $mysqliConnLangInsert->close();
        }
    }
}
