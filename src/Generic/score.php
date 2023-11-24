<?php

namespace JCMarkupSuite\Generic;

class Score
{
    private $scoreValue;

    public function __construct($scoreValue)
    {
        $this->scoreValue = $scoreValue;
    }

    /**
     * Render the preview list
     * 
     * @param string $title 
     * @param string $excerpt 
     * @param string $coverimage
     * @param string $link
     * 
     */
    public function render()
    {
        ob_start();
?>
        <div class="preview-list__item xs:flex">
            <?= $this->scoreValue; ?>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * Render the preview list image
     * 
     * @param string $title 
     * @param string $image
     * 
     */

    public static function renderImage($alt = '', $image = '')
    {
        ob_start();
    ?>
        <div class="preview-list__item__image">
            <img src="<?= $image; ?>" alt="<?= $alt; ?>">
        </div>

    <?php
        return ob_get_clean();
    }

    /**
     * Render the preview list content
     * 
     * @param string $title 
     * @param string $excerpt 
     * @param string $coverimage
     * @param string $link
     * 
     */

    public static function renderContent($title = '', $excerpt = '')
    {
        ob_start();

    ?>
        <div class="preview-list__item__content">
            <h3 class="preview-list__item__content__title">
                <?= $title; ?>
            </h3>
            <p class="preview-list__item__content__excerpt">
                <?= $excerpt; ?>
            </p>
        </div>
<?php
        return ob_get_clean();
    }
}
