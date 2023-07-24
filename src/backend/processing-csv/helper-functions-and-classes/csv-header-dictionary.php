<?php
require_once("Dictionary.php");
require_once("DictionaryItem.php");
require_once("helper-functions.php");

function returnGermanDictionary():Dictionary
{
//below is boring manual work, with adding dictionary for later pattern recognition
    /**
     * Deutsch:
     * */
    $dictionaryDE = new Dictionary();
    $dictionaryDE->languageInt = 3;
    $dictionaryDE->languageStr = "Deutsch";

    $item = new DictionaryItem();
    $item->value = "anrede";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "titel";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "adress";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "betitelung";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "bezeichnung";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "titulierung";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "t.";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "name";
    $item->databaseFieldName = "first_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "vorname";
    $item->databaseFieldName = "first_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "erste name";
    $item->databaseFieldName = "first_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "rufname";
    $item->databaseFieldName = "first_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "taufbane";
    $item->databaseFieldName = "first_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "letzte name";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "nachname";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "familienname";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "zuname";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "geburtstag";
    $item->databaseFieldName = "date_of_birth_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "geburtsdatum";
    $item->databaseFieldName = "date_of_birth_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "ehrentag";
    $item->databaseFieldName = "date_of_birth_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "feiertag der geburt";
    $item->databaseFieldName = "date_of_birth_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "land";
    $item->databaseFieldName = "country";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "staat";
    $item->databaseFieldName = "country";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "Volk";
    $item->databaseFieldName = "country";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "e-mail";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "telefon";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "Telefonnummer";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "rufnummer";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "handy";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "fernsprechnummer";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "t";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "tel";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "sprache";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "sprachen";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "sprache";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "kauderwelsch";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);

    $item = new DictionaryItem();
    $item->value = "spr";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryDE->addItem($item);
    return $dictionaryDE;
}

/************************************************************ */
/************************************************************ */
/************************************************************ */
/************************************************************ */

function returnEnglishDictionary():Dictionary
{
    /**
     * English:
     * */
    $dictionaryEN = new Dictionary();
    $dictionaryEN->languageInt = 2;
    $dictionaryEN->languageStr = "English";

    $item = new DictionaryItem();
    $item->value = "salutation";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "sal";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "salut";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "rank";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "salute";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "ranked";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "address";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "form of address";
    $item->databaseFieldName = "salutation";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "first name";
    $item->databaseFieldName = "first_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "name";
    $item->databaseFieldName = "first_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "forename";
    $item->databaseFieldName = "first_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "last name";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "second name";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "surname";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "byname";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "family name";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "married name";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "soubriquet";
    $item->databaseFieldName = "last_name";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "date of birth";
    $item->databaseFieldName = "date_of_birth_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "birthday";
    $item->databaseFieldName = "date_of_birth_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "birth date";
    $item->databaseFieldName = "date_of_birth_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "natal day";
    $item->databaseFieldName = "date_of_birth_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "name day";
    $item->databaseFieldName = "date_of_birth_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "country";
    $item->databaseFieldName = "country";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "land";
    $item->databaseFieldName = "country";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "state";
    $item->databaseFieldName = "country";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "nation";
    $item->databaseFieldName = "country";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "homeland";
    $item->databaseFieldName = "country";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "email";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "e-mail";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "e mail";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "mail";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "e post";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "e-post";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "e-message";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "electronic mail";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "web mail";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "online mail";
    $item->databaseFieldName = "email";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "phone number";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "phone";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "number";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "ph number";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "cell";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "cell number";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "cell phone number";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "telephone number";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "contact phone number";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "call";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "t";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "m";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "tel";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "mob";
    $item->databaseFieldName = "phone_number";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    /************************************************************ */

    $item = new DictionaryItem();
    $item->value = "language";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "lang";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "lan";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "lingo";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "tongue";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "speech";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);

    $item = new DictionaryItem();
    $item->value = "lng";
    $item->databaseFieldName = "language1_string";
    $item->mainPositionInDatabase = retrieveDatabasePositionIdFromDatabaseFieldName($item->databaseFieldName);
    $dictionaryEN->addItem($item);
    return $dictionaryEN;
}