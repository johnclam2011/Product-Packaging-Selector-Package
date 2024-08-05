<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BoxSelector\ProductPackagingSelector\Services\BoxSelector;

class ProductController extends Controller
{
    public function showForm()
    {
        return view('products');
    }

    public function selectBox(Request $request, BoxSelector $boxSelector)
    {
        $products = $request->input('products');

        $boxes = $boxSelector->selectBoxes($products);

        if ($boxes === false) {
            return back()->withErrors('One or more products do not fit in any available box.');
        }

        return view('results', ['boxes' => $boxes]);
    }

}
