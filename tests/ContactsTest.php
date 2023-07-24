<?php
require_once("src\backend\processing-csv\helper-functions-and-classes\FindLanguagesSeparator.php");
require_once("src\backend\common-php-functions\common-functions.php");
require_once("src\backend\processing-csv\helper-functions-and-classes\helper-functions.php");

class ContactsTest extends \PHPUnit\Framework\TestCase {
    public function testFindLanguagesSeparator() {
        $findLanguagesSeparator = new FindLanguagesSeparator();
        $result = $findLanguagesSeparator::get("English,German");
        $this->assertEquals(",", $result);
    }

    public function testIsEmptyAndReturn() {
        $arrayTest = array();
        $arrayTest[5] = "test5";

        $result = isEmptyAndReturn(5,$arrayTest);
        $this->assertEquals("test5", $result);

        $result = isEmptyAndReturn(8,$arrayTest);
        $this->assertEquals("", $result);

        $result = isEmptyAndReturn(NULL,$arrayTest);
        $this->assertEquals("", $result);

        $result = isEmptyAndReturn(5,NULL);
        $this->assertEquals("", $result);
    }
}