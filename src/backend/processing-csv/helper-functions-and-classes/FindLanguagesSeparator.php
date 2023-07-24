<?php
class FindLanguagesSeparator {
    public static function get($languageField):string
    {
        if(doesItContain($languageField, ",")){
            return ",";
        }
        else if(doesItContain($languageField, ";")){
            return ";";
        }
        else if(doesItContain($languageField, "/")){
            return "/";
        }
        else if(doesItContain($languageField, " ")){
            return " ";
        }
        else if(doesItContain($languageField, ".")){
            return ".";
        }
        else if(doesItContain($languageField, "'")){
            return "'";
        }
        else if(doesItContain($languageField, "-")){
            return "-";
        }
        else if(doesItContain($languageField, "_")){
            return "_";
        }

        return "";
    }
}