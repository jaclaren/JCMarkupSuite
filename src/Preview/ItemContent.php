<?php

namespace JCMarkupSuite\Preview;

use JCMarkupSuite\Generic\Score;
use JCMarkupSuite\Interfaces\IScore;

/**
 * 
 * This class is used to render the content of the preview list item.
 */

class ItemContent
{
    public $columns = [];

    /*
        What can the column contain?
        - Score
        - Title and Meta colunns        
    */

    public function __construct(ItemPartColumn ...$columns)
    {
        // If no columns are provided, add a default column.
        if (count($columns) === 0) {
            $this->columns[] = new ItemPartColumn();
        }       

        foreach ($columns as $column) {
            $this->columns[] = $column;
        }
    }

    /** Different variations: with score, without score */

    public function render()
    {
        return "ItemContent";
    }
}
