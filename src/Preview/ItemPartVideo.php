<?php

/**
 * Class item part image
 */

namespace JCMarkupSuite\Preview;

class ItemPartVideo
{
    public $url = '';
    public $title = '';

    public function __construct($url, $title)
    {
        $this->url = $url;
        $this->title = $title;
    }

    public function get_embed($url)
    {
        $embed = null;

        if (strpos($url, 'youtube') !== false) {
            return \PeliArvostelut\GenericMarkupGenerator::generate_youtube_embed($url);
        } 

        return $embed;
    }

    public function render()
    {
        ob_start();
    ?>
        <div class="preview-item__video">
            <?php if ($this->url) : ?>
                <?= $this->get_embed($this->url); ?>
            <?php endif; ?>
        </div>
    <?php
        return ob_get_clean();
    } 
}