<?php

namespace JCMarkupSuite\Generic;

use JCMarkupSuite\Interfaces\IScore;

class Score implements IScore
{
    private $scoreValue;

    public function __construct($scoreValue)
    {
        $this->scoreValue = $scoreValue;
    }

    /**
     * Function to determine score color css class
     */

    public function getScoreColorClass()
    {
        $scoreValue = $this->scoreValue;

        if ($scoreValue >= 80) {
            return 'score--green';
        } elseif ($scoreValue >= 70) {
            return 'score--yellow';
        } elseif ($scoreValue < 60) {
            return 'score--red';
        } else {
            return 'score--grey';
        }
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
        <div class="preview-list__item xs:flex score <?= $this->getScoreColorClass(); ?>">
            <?= $this->scoreValue; ?>%
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
