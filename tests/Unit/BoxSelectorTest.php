<?php

namespace Tests\Unit;

use Tests\TestCase;
use BoxSelector\ProductPackagingSelector\Services\BoxSelector;

class BoxSelectorTest extends TestCase
{
    public function testSelectBoxes()
    {
        $boxSelector = new BoxSelector();

        $products = [
            ['length' => 10, 'width' => 10, 'height' => 10, 'weight' => 2, 'quantity' => 1],
            ['length' => 20, 'width' => 15, 'height' => 10, 'weight' => 5, 'quantity' => 2]
        ];

        $result = $boxSelector->selectBoxes($products);

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals('BOXA', $result[0]['box']);
        $this->assertEquals('BOXB', $result[1]['box']);
    }

    public function testCannotFitAllProducts()
    {
        $boxSelector = new BoxSelector();

        $products = [
            ['length' => 100, 'width' => 100, 'height' => 100, 'weight' => 2, 'quantity' => 1],
        ];

        $result = $boxSelector->selectBoxes($products);

        $this->assertEquals(422, $result->status());
    }
}
