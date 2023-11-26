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

    /**
     * Function that renders a sidebar
     */

    public static function renderSidebar(?object $content)
    {
?>
        <div class="preview-list__item__content__col">
            <?= $content->render(); ?>
        </div>
    <?php
    }

    /** 
     * Renders meta rows if available
     */

    public function renderMetaRows()
    {
    ?>
        <div class="preview-item__metarow">
            <?php foreach ($this->metaRows as $metaRow) : ?>
                <?= $metaRow->render(); ?>
            <?php endforeach; ?>
        </div>
    <?php
    }

    /**
     * Function to render the main content area
     * 
     * @param ?object[] $content
     */

    public function renderMainContent()
    {
    ?>
        <div class="preview-list__item__content__col preview-item__details">
            <h3><?= $this->text; ?></h3>
            <?php

            if (!empty($this->metaRows) && count($this->metaRows) > 0) {
                $this->renderMetaRows();
            }
            ?>
        </div>
    <?php
    }

    /**
     * Function to render sidebar.     * 
     * 
     * 
     */

    public function generateHTML()
    {
    ?>
        <div class="flex flex-h preview-list__item__content">
            <?php if ($this->score) : ?>
                <?= $this->renderSidebar($this->score); ?>
            <?php endif; ?>
            
            <?= $this->renderMainContent(); ?>
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
