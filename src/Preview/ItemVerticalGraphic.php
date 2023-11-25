<?php

namespace JCMarkupSuite\Preview;

use JCMarkupSuite\Generic\Score;
use JCMarkupSuite\Interfaces\IScore;

class ItemVerticalGraphic extends ItemDefault
{
    public static function renderImage($alt = '', $image = '')
    {
        ob_start();
    ?>
        <div class="preview-list__item__image vertical-graphic">
            <img src="<?= $image; ?>" alt="<?= $alt; ?>">
        </div>

    <?php
        return ob_get_clean();
    }


}
