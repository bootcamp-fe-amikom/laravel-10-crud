<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    //
    public function index(){
        $sales = Sale::get();
        $data =[
            'sales' =>$sales,
        ];
        return view('sale',$data);
    }
}
