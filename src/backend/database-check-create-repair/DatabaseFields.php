<?php
class DatabaseFields
{
    private $allFields = array();

    function addField($field)
    {
        if( $field->asInStoredInDatabase!=""&&$field->asInStoredInDatabase!==NULL&&
            $field->databasePropertyType!=""&&$field->databasePropertyType!==NULL&&$field->numberIdPosition!==NULL)
        {
            $this->allFields[] = $field;
        }
    }

    /**
     * @return array
     */
    public function get_allFields(): array
    {
        return $this->allFields;
    }
}