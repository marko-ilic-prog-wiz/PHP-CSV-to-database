<?php

class Dictionary
{
    public $languageStr;
    public $languageInt;
    public $items = array();

    function addItem($item){
        $this->items[] = $item;
    }
}