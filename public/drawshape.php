<?php
class DrawCircleAnDLines
{
    private $_fillColor;

    private $_xyCoordinatesForCircle;

    private $_xyCoordinatesForLine;

    private $_backgroundColor;

    public function __construct($fillColor, $xyCoordinatesForCircle, $xyCoordinatesForLine, $backgroundColor)
    {
        $this->_fillColor = $fillColor;

        $this->_xyCoordinatesForCircle = $xyCoordinatesForCircle;

        $this->_xyCoordinatesForLine = $xyCoordinatesForLine;

        $this->_backgroundColor = $backgroundColor;
    }

    public function draw()
    {
        $draw = new \ImagickDraw();

        $draw->setStrokeColor("#ffffff");
        $draw->setStrokeOpacity(1);
        $draw->setFillColor($this->_fillColor);

        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);
        $draw->setFillOpacity(0.1);
        foreach($this->_xyCoordinatesForCircle as $circleXYCoordinates){
            $draw->circle($circleXYCoordinates['originX'], $circleXYCoordinates['originY'], $circleXYCoordinates['endX'], $circleXYCoordinates['endY']);
        }

        foreach($this->_xyCoordinatesForLine as $lineXYCoordinates){
            $draw->line($lineXYCoordinates['originX'], $lineXYCoordinates['originY'], $lineXYCoordinates['endX'], $lineXYCoordinates['endY']);
        }

        $imagick = new \Imagick();
        $imagick->newImage(500, 500, '#000000');
        $imagick->setImageFormat("png");
        $imagick->drawImage($draw);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}

$circleDraw = [
    ['originX' => 50, 'originY' => 40, 'endX' => 50, 'endY' => 60],
    ['originX' => 350, 'originY' => 40, 'endX' => 350, 'endY' => 60],
    ['originX' => 100, 'originY' => 150, 'endX' => 100, 'endY' => 170],
    ['originX' => 300, 'originY' => 150, 'endX' => 300, 'endY' => 170],
    ['originX' => 180, 'originY' => 260, 'endX' => 180, 'endY' => 280]
];

$lineDraw = [
    ['originX' => 70, 'originY' => 40, 'endX' => 330, 'endY' => 40],
    ['originX' => 55, 'originY' => 60, 'endX' => 90, 'endY' => 130],
    ['originX' => 110, 'originY' => 170, 'endX' => 170, 'endY' => 240],
    ['originX' => 190, 'originY' => 240, 'endX' => 290, 'endY' => 167],
    ['originX' => 310, 'originY' => 130, 'endX' => 350, 'endY' => 60]
];

$drawCircle1 = new DrawCircleAnDLines('#ffffff', $circleDraw, $lineDraw, '#000000');
$imageDraw[] = $drawCircle1->draw();


?>