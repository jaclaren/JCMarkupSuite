<?php

namespace JCMarkupSuite\Preview;

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
                <div class="preview-list__item__image">
                    <?php # if thumbnail not availabl,e use coverimage ?>
                    <?Php if (has_post_thumbnail($post->ID)) : ?>
                        <?= get_the_post_thumbnail($post->ID, 'medium'); ?>
                    <?php else : ?>
                        <img class="preview-list__item__image__coverimage" src="<?= $coverimage; ?>" alt="<?= $post->post_title; ?>">
                        <div class="preview-list__item__image__placeholder" style="background: url(<?= $coverimage; ?>); ">
                        </div>
                    <?php endif; ?>                    
                </div>
                <div class="preview-list__item__content">
                    <h3><?= $title; ?></h3>
                    <p><?= $excerpt; ?></p>
                </div>
            </a>
        </div>
        <?php
        return ob_get_clean();
    }
}

    