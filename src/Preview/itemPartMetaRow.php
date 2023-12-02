<?php

/**
 * Class item part meta row.  
 */

namespace JCMarkupSuite\Preview;

class ItemPartMetaRow
{
    public $icon = '';
    public $value = '';

    public function __construct($icon = '', $value = '')
    {
        $this->icon = $icon;
        $this->value = $value;
    }

    public function render()
    {
        ob_start();
?>
        <div class="preview-item__metarow__col">
            <?= \JCMarkupSuite\Generic\TextRenderer::renderTextWithIcon($this->value, $this->icon); ?>
        </div>
<?php
        return ob_get_clean();
    }

    public static function renderStatic($icon = '', $value = '')
    {
        $itemPartMetaRow = new ItemPartMetaRow($icon, $value);
        return $itemPartMetaRow->render();
    }
}
