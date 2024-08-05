<?php

namespace BoxSelector\ProductPackagingSelector\Services;

class BoxSelector
{
    private $boxes = [
        ["name" => "BOXA", "length" => 20, "width" => 15, "height" => 10, "weight_limit" => 5],
        ["name" => "BOXB", "length" => 30, "width" => 25, "height" => 20, "weight_limit" => 10],
        ["name" => "BOXC", "length" => 60, "width" => 55, "height" => 50, "weight_limit" => 50],
        ["name" => "BOXD", "length" => 50, "width" => 45, "height" => 40, "weight_limit" => 30],
        ["name" => "BOXE", "length" => 40, "width" => 35, "height" => 30, "weight_limit" => 20]
    ];

    public function selectBoxes($products)
    {

        $boxes = $this->boxes;
        // Sort boxes by volume (smallest to largest)
        usort($boxes, function($a, $b) {
            return ($a['length'] * $a['width'] * $a['height']) - ($b['length'] * $b['width'] * $b['height']);
        });

        $packedBoxes = [];

        foreach ($products as $product) {
            $productVolume = $product['length'] * $product['width'] * $product['height'] * $product['quantity'];
            $productWeight = $product['weight'] * $product['quantity'];

            $boxFound = false;

            foreach ($boxes as $box) {
                $boxVolume = $box['length'] * $box['width'] * $box['height'];
                if ($productVolume <= $boxVolume && $productWeight <= $box['weight_limit'] &&
                    $product['length'] <= $box['length'] && $product['width'] <= $box['width'] && $product['height'] <= $box['height']) {
                    $packedBoxes[] = [
                        'box' => $box['name'],
                        'products' => [$product],
                    ];
                    $boxFound = true;
                    break;
                }
            }

            if (!$boxFound) {
                return false;
            }
        }

        return $packedBoxes;
    }

}
