<?php

namespace App\Http\Controllers;

use App\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $products=Product::select('name')->where('name','LIKE','%'.$request->search."%")->get();
            if($products){  
                foreach ($products as $key => $product) {
                    $output.='<tr>'.
                    '<td>'.$product->id.'</td>'.
                    '<td>'.$product->name.'</td>'.
                    '<td>'.$product->quantity.'</td>'.
                    '<td>'.$product->price.'</td>'.
                    '</tr>';
                }
            return Response($output);
            }
        }
    }
}
