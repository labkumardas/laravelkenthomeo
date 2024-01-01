<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    public static function convertToSvg($imagePath)
    {

        $imagine = new \Imagine\Gd\Imagine();
        $image = $imagine->open($imagePath);
        $width = $image->getSize()->getWidth();
        $height = $image->getSize()->getHeight();
        $svgContent = "<svg xmlns='http://www.w3.org/2000/svg' width='{$width}' height='{$height}'>";
        $svgContent .= "<rect width='{$width}' height='{$height}' style='fill:white;stroke-width:3;stroke:black' />";
        $svgContent .= "</svg>";
        $svgFilename = pathinfo($imagePath, PATHINFO_FILENAME) . '.svg';
        Storage::disk('public')->put($svgFilename, $svgContent);
        $svgUrl = asset('uploads/' . $svgFilename);

        return $svgUrl;
    }
}
