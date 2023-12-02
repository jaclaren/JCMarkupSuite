<?php

namespace JCMarkupSuite\Generic;

class TextRenderer
{
    /**
     * Render text with icon
     * 
     * @param string $text
     * @param string $icon
     * 
     * // Arguments take in default class names
     * @param array $args  Additional arguments
     * @param string $args['class_icon']  Additional class names for icon element
     * @param string $args['class_text']  Additional class names for text element
     * 
     * @return string
     * 
     */

    public static function renderTextWithIcon($text = '', $icon = '', $args = array(
        'class_icon' => 'icon',
        'class_text' => 'text'
    ))
    {
        ob_start();
?>
        <?php if ($icon != '') : ?>
            <div class="<?= $args['class_icon']; ?> <?= $icon; ?>"></div>
        <?php endif; ?>
        <div class="<?= $args['class_text']; ?>">
            <?= $text; ?>
        </div>
<?php
        return ob_get_clean();
    }
}
