<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = [
            [
                'name' => 'Semangka',
                'weight' => 0.7,
                'price' => 10000,
            ],
            [
                'name' => 'Melon',
                'weight' => 0.4,
                'price' => 14000,
            ],
            [
                'name' => 'Jeruk',
                'weight' => 1.3,
                'price' => 23000,
            ],
        ];

        // ......
        $products = null;

        if(!$products) {
            return [
                'meta' => [
                    'code' => 404,
                    'message' => 'failed get products'
                ],
                'data' => null,
            ];
        }

        return [
            'meta' => [
                'code' => 200,
                'message' => 'success get products'
            ],
            'data' => $products,
        ];
    }
}
