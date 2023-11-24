<?php

namespace JCMarkupSuite\Preview;

use JCMarkupSuite\Generic\Score;

class ItemDefault
{
    /**
     * Render the preview list
     * 
     * @param string $title 
     * @param string $excerpt 
     * @param string $coverimage
     * @param string $link
     * 
     */
    public static function render($title = '', $excerpt = '', $coverimage = '', $link = '')
    {
        ob_start();
?>
        <div class="preview-list__item xs:flex">
            <a href="<?= $link; ?>">
                <?= self::renderImage($title, $excerpt, $coverimage, $link); ?>
                <?= self::renderContent($title, $excerpt, $coverimage, $link); ?>
            </a>
        </div>
    <?php
        return ob_get_clean();
    }

    public static function renderContentWithScore(Score $score, $title = '', $excerpt = '')
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
            <?= $score->render(); ?>
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

    public static function renderImage($alt = '',$image = '')
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
