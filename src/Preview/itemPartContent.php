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

    /**
     * Constructor
     * 
     * @param string $text
     */

    public function __construct($text = '')
    {
        $this->text = $text;
    }

    /**
     * Function to add a score
     * 
     * @param IScore $score
     * 
     */

    public function addScore(IScore $score)
    {
        $this->score = $score;
    }

    /**
     * Function to add a meta row
     * 
     * @param ItemPartMetaRow $metaRow
     */

    public function addMetaRow(ItemPartMetaRow $metaRow)
    {
        $this->metaRows[] = $metaRow;
    }

    public function generateHTML()
    {
?>
        <div class="preview-list__item__content">
            <?php if ($this->score) : ?>
                <div class="preview-list__item__content__col preview-list__item__content__score">
                    <?= $this->score->render(); ?>
                </div>
            <?php endif; ?>

            <?php if (count($this->metaRows) > 0) : ?>
                <div class="flex flex-v">
                    <h3><?= $this->text; ?></h3>
                    <div class="preview-list__item__content__col preview-list__item__content__metas">
                        <?php foreach ($this->metaRows as $metaRow) : ?>
                            <?= $metaRow->render(); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="preview-list__item__content__col preview-list__item__content__text">
                    <h3><?= $this->text; ?></h3>
                </div>
            <?php endif; ?>
        </div>
<?php
    }

    public function render()
    {
        ob_start();
        $this->generateHTML();
        return ob_get_clean();
    }
}
