<?php

namespace JCMarkupSuite\Slider;

class SliderBase 
{
    // root class
    public $rootClass = null;

    // items
    public $items = array();

    // constructor

    public function __construct($rootClass = '')
    {
        $this->rootClass = $rootClass;
    }

    /**
     * Add item to slider.
     * 
     * @param $item Pre-rendered item to add.
     */
    public function addItem($item)
    {
        $this->items[] = $item;
    }

    /**
     * Render slider
     */

    public function render()
    {
        ob_start();

?>

<div class="swiffy-slider">
    <ul class="slider-container">
        <?php foreach ($this->items as $index => $item) : ?>
            <li>
                <!-- id is index -->
                <div class="slide" id="slide<?= $index+1; ?>"><?= $item; ?></div>
            </li>
        <?php endforeach; ?>
    </ul>

    <button type="button" class="slider-nav"></button>
    <button type="button" class="slider-nav slider-nav-next"></button>

    <ul class="slider-indicators">
        <?php foreach ($this->items as $index => $item) : ?>
            <li class="<?= $index == 0 ? 'active' : ''; ?>"></li>
        <?php endforeach; ?>
    </ul>
</div>

<?php

        $slider = ob_get_clean();

        return $slider;
    }
}
