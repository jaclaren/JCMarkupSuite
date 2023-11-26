<?php

namespace JCMarkupSuite\Preview;

use JCMarkupSuite\Generic\Score;
use JCMarkupSuite\Interfaces\IScore;

/**
 * 
 * This class is used to render the content of the preview list item.
 */

class ItemPartContent
{
    protected $text = '';
    protected $score = null;
    protected $metaRows = [];

    /*
        What can the column contain?
        - Score
        - Title and Meta colunns        
    */

    public function __construct($text = '')
    {
        $this->text = $text;
    }

    /** Different variations: with score, without score */

    public function addScore(IScore $score)
    {
        $this->score = $score;
    }

    /** Function to add a meta row */

    public function addMetaRow(ItemPartMetaRow $metaRow)
    {
        $this->metaRows[] = $metaRow;
    }

    public function render()
    {

        ob_start(); ?>
        <div class="preview-list__item__content">
            <h3><?= $this->text; ?></h3>
        </div>

<?php
        return ob_get_clean();
    }
}
