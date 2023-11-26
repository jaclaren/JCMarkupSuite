<?php

/**
 * Class item part image
 */

namespace JCMarkupSuite\Preview;

class ItemPartImage
{
    public $image = '';
    public $alt = '';
    public $class = '';

    public function __construct($image = '', $alt = '', $class = '')
    {
        $this->image = $image;
        $this->alt = $alt;
        $this->class = $class;
    }

    public function render()
    {
        ob_start();
    ?>
        <div class="preview-list__item__image <?= $this->class; ?>">
            <img src="<?= $this->image; ?>" alt="<?= $this->alt; ?>">
        </div>
    <?php
        return ob_get_clean();
    }

    public static function renderStatic($image = '', $alt = '', $class = '')
    {
        $itemPartImage = new ItemPartImage($image, $alt, $class);
        return $itemPartImage->render();
    }
}