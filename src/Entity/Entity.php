<?php

namespace JCMarkupSuite\Entity;

class Entity {
    // static function renderTitle

    public static function render_title_with_content_type($title, $content_type,  $mainClass = 'preview-title', $content_type_class = '') {
        ob_start();

        ?>
            <h3 class="<?= $mainClass; ?>">
                <span class="content-type--intitle <?= $content_type_class; ?>"><?= $content_type; ?></span>
                <?= $title; ?>
            </h3>
        <?php

        return ob_get_clean();
    }

}