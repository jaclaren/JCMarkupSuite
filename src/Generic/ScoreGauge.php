<?php

namespace JCMarkupSuite\Generic;

use JCMarkupSuite\Interfaces\IScore;

class ScoreGauge extends Score
{
    function generateSVG($percentage)
    {
        // Ensure the percentage is within the valid range
        $percentage = max(0, min(100, $percentage));

        // Calculate the circumference of the circle
        $circumference = 2 * M_PI * 40;

        // generate dash array and offset
        $dashArray = $circumference;
        $dashOffset = $circumference - ($circumference * $percentage / 100);

        $rotationAngle = -90;

        // Generate the SVG
        $svg = <<<SVG
<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg">
  <!-- Circle with Stroke Dash Offset based on the percentage -->

  <circle cx="50" cy="50" r="40" stroke="#111" fill="none" stroke-width="10" />

  <g transform="rotate($rotationAngle 50 50)">
  <circle cx="50" cy="50" r="40" stroke="green" class="gauge-circle" stroke-width="10" fill="none" stroke-dasharray="$dashArray" stroke-dashoffset="$dashOffset" />
    </g>
</svg>
SVG;
        return $svg;
    }

    public function render()
    {
        ob_start();

        // get scorevalue from parent

        $scoreValue = $this->scoreValue;

?>
        <div class="score score-gauge <?= $this->getScoreColorClass(); ?>">
            <div class="score-gauge__gauge">
                <?= $this->generateSVG($scoreValue); ?>
            </div>
            <div class="score-gauge__text">
                <span><?= $scoreValue; ?></span>                
            </div>
        </div>
<?php
        return ob_get_clean();
    }
}
