<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{public static function convertToSvg($imagePath)
    {
        // Load the image using Imagine
        $imagine = new \Imagine\Gd\Imagine();
        $image = $imagine->open($imagePath);
    
        // Get image dimensions
        $width = $image->getSize()->getWidth();
        $height = $image->getSize()->getHeight();
    
        // Generate SVG content dynamically based on image dimensions
        $svgContent = "<svg xmlns='http://www.w3.org/2000/svg' width='{$width}' height='{$height}'>";
        $svgContent .= "<rect width='{$width}' height='{$height}' style='fill:white;stroke-width:3;stroke:black' />";
        $svgContent .= "</svg>";
    
        // Generate a unique filename for the SVG
        $svgFilename = pathinfo($imagePath, PATHINFO_FILENAME) . '.svg';
    
        // Save the SVG content to the 'public' disk in the 'uploads' directory
        Storage::disk('public')->put($svgFilename, $svgContent);
    
        // Get the full URL for the saved SVG using the 'asset' helper function
        $svgUrl = asset('uploads/' . $svgFilename);
        dd($svgUrl);
        return $svgUrl;
    }
    
}