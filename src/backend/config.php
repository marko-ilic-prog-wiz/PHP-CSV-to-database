<?php
    require_once("database-check-create-repair/DatabaseFields.php");
    require_once("database-check-create-repair/OneDatabaseField.php");

    const DEBUG_ENABLED = true;

    const DBUSER = 'root';
    const DBPWD = 'mw-it-test';
    const DBHOST = 'db';
    const DBPORT = '3306';
    const DBNAME = 'csv_database';
    const TBNAME = 'contacts_m'; //main table name
    const COUNTRIES_TBNAME = 'countries_m'; //laguages table name
    const LANGUAGES_TBNAME = 'languages_m'; //laguages table name


    const HOW_MANY_TABLE_BACKUPS = 20; //max number of backups in folder recovery-database-backups
    const HOW_MANY_DATABASE_CHECKS = 150; //number of database checks before turning off for speed and security,
                                        //0 means it is completely turned off, the script won't check if there is a
                                        //database, nor table, nor if it's corrupted.

    /*
     * application's first second of being alive since UNIX timestamp epoch,
     * will be used to store smaller integers in the database by subtracting this integer from current one in present UNIX or time(),
     * comparing and sorting by this is faster.
     */
    const APP_START_INT = 1674420000;

    //Quick debug, error showing only for development purposes
    if(DEBUG_ENABLED)
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
    else
    {
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Declaring main table fields
    function declareFieldsOnMainTable()
    {
        $mainTableFields = new DatabaseFields();

        $autoIncrementFieldPositions = 0;

        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "id";
        $field->databasePropertyType = "bigint NOT NULL AUTO_INCREMENT";
        $field->name = "ID";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Unique autoincrement ID";
        $field->comment = "Uniquely identifies the row";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "creation_time";
        $field->databasePropertyType = "datetime";
        $field->name = "Creation time";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Time of row creation in the database";
        $field->comment = "Date time standard from mysql, takes server timezone";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "modification_time";
        $field->databasePropertyType = "datetime";
        $field->name = "Modification time";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Time of row modification in the database";
        $field->comment = "Date time standard from mysql, takes server timezone";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "salutation";
        $field->databasePropertyType = "varchar(50)";
        $field->name = "Salutation";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Salutation for describing peoples titles";
        $field->comment = "Typically Mr, Herr, Dr";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "first_name";
        $field->databasePropertyType = "varchar(80)";
        $field->name = "First name";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Persons first name";
        $field->comment = "Persons name up to 80 characters";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "last_name";
        $field->databasePropertyType = "varchar(50)";
        $field->name = "Last name";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Persons last name";
        $field->comment = "Persons last name up to 50 characters";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "date_of_birth_string";
        $field->databasePropertyType = "varchar(80)";
        $field->name = "Date of birth string";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Date of birth string, directly parsed from csv file";
        $field->comment = "Ideally in european format: 13.12.2023.";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "date_of_birth_int";
        $field->databasePropertyType = "bigint";
        $field->name = "Date of birth int";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Date of birth integer, counter in seconds from January 1st, 1970 (midnight UTC/GMT)";
        $field->comment = "Ideally in european format: 13.12.2023.";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "country";
        $field->databasePropertyType = "varchar(60)";
        $field->name = "Country";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Country of the person";
        $field->comment = "Parsed directly from CSV";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "country_int";
        $field->databasePropertyType = "int";
        $field->name = "Country int";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Country integer, joint ID from the table of countries";
        $field->comment = "Analyzed and saved as an integer";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "email";
        $field->databasePropertyType = "varchar(320)";
        $field->name = "E-mail";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "E-mail of the person";
        $field->comment = "Should contain at least one . in domain portion and only one @. The end - a valid top-level domain";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "phone_number";
        $field->databasePropertyType = "varchar(15)";
        $field->name = "Phone number";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Phone number of the person";
        $field->comment = "Max length 15, only numbers and + is allowed.";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language1_string";
        $field->databasePropertyType = "varchar(60)";
        $field->name = "Language1 string";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language1 string";
        $field->comment = "Parsed directly from CSV";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language1_int";
        $field->databasePropertyType = "int";
        $field->name = "Language1 int";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language1 int";
        $field->comment = "Analyzed, saved as a joint ID int from table of languages";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language2_string";
        $field->databasePropertyType = "varchar(60)";
        $field->name = "Language2 string";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language2 string";
        $field->comment = "Parsed directly from CSV";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language2_int";
        $field->databasePropertyType = "int";
        $field->name = "Language2 int";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language2 int";
        $field->comment = "Analyzed, saved as a joint ID int from table of languages";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language3_string";
        $field->databasePropertyType = "varchar(60)";
        $field->name = "Language3 string";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language3 string";
        $field->comment = "Parsed directly from CSV";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language3_int";
        $field->databasePropertyType = "int";
        $field->name = "Language3 int";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language3 int";
        $field->comment = "Analyzed, saved as a joint ID int from table of languages";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language4_string";
        $field->databasePropertyType = "varchar(60)";
        $field->name = "Language4 string";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language4 string";
        $field->comment = "Parsed directly from CSV";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language4_int";
        $field->databasePropertyType = "int";
        $field->name = "Language4 int";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language4 int";
        $field->comment = "Analyzed, saved as a joint ID int from table of languages";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language5_string";
        $field->databasePropertyType = "varchar(60)";
        $field->name = "Language5 string";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language5 string";
        $field->comment = "Parsed directly from CSV";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language5_int";
        $field->databasePropertyType = "int";
        $field->name = "Language5 int";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language5 int";
        $field->comment = "Analyzed, saved as a joint ID int from table of languages";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language6_string";
        $field->databasePropertyType = "varchar(60)";
        $field->name = "Language6 string";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language6 string";
        $field->comment = "Parsed directly from CSV";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language6_int";
        $field->databasePropertyType = "int";
        $field->name = "Language6 int";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language6 int";
        $field->comment = "Analyzed, saved as a joint ID int from table of languages";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language7_string";
        $field->databasePropertyType = "varchar(60)";
        $field->name = "Language7 string";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language7 string";
        $field->comment = "Parsed directly from CSV";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language7_int";
        $field->databasePropertyType = "int";
        $field->name = "Language7 int";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language7 int";
        $field->comment = "Analyzed, saved as a joint ID int from table of languages";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language8_string";
        $field->databasePropertyType = "varchar(60)";
        $field->name = "Language8 string";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language8 string";
        $field->comment = "Parsed directly from CSV";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "language8_int";
        $field->databasePropertyType = "int";
        $field->name = "Language8 int";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Language8 int";
        $field->comment = "Analyzed, saved as a joint ID int from table of languages";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "creation_time_int";
        $field->databasePropertyType = "bigint";
        $field->name = "Creation time";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Time of row creation in the database";
        $field->comment = "UNIX EPOCH standard, recorded from APP_START_INT until now";
        $mainTableFields->addField($field);
        $autoIncrementFieldPositions++;
        /************************************/
        $field = new OneDatabaseField();
        $field->asInStoredInDatabase = "modification_time_int";
        $field->databasePropertyType = "bigint";
        $field->name = "Modification time";
        $field->numberIdPosition = $autoIncrementFieldPositions;
        $field->descriptiveName = "Time of row modification in the database";
        $field->comment = "UNIX EPOCH standard, recorded from APP_START_INT until now";
        $mainTableFields->addField($field);
        return $mainTableFields;
    }