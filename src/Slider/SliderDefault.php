<?php

namespace JCMarkupSuite\Slider;

class SliderDefault extends SliderBase
{
    // render
    public function render()
    {
        ob_start();

?>

        <div class="swiffy-slider slider-item-helper slider-item-show2 slider-item-reveal">
            <ul class="slider-container">
                <?php foreach ($this->items as $index => $item) : ?>
                    <li>
                        <!-- id is index -->
                        <div class="slide" id="slide<?= $index + 1; ?>">
                            <?= $item; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <?php if (count($this->items) > 2) : ?>
                <button type="button" class="slider-nav"></button>
                <button type="button" class="slider-nav slider-nav-next"></button>


                <div class="slider-indicators">
                    <?php foreach ($this->items as $index => $item) : ?>
                        <button class="<?= $index == 0 ? 'active' : ''; ?>"></button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

<?php
        $slider = ob_get_clean();

        return $slider;
    }
}
