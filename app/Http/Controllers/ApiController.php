<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ApiController extends Controller
{
    // Begin Product Api Methods

    public function productData(){

        $result['data'] = DB::table('products')
                         ->select('id as Id',
                                  'product_name as Name',
                                  'created_at as Created')
                         ->get();

        return json_encode($result);

    }

    public function productVueData(Request $request){

        $column = 'id';
        $direction = 'asc';

        if ($request->has('column')){

            $column = $request->get('column');
            if ($column == 'Id'){
                $direction = $request->get('direction') == 1 ? 'asc' : 'desc';
            } else {

                $direction = $request->get('direction') == 1 ? 'desc' : 'asc';
            }


        }

        if ($request->has('keyword')){

            $keyword = $request->get('keyword');

            $products = DB::table('products')
                ->select('id as Id',
                    'product_name as Name',
                    'created_at as Created')
                ->where('product_name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return response()->json($products);



        }

        $products = DB::table('products')
                             ->select('id as Id',
                                      'product_name as Name',
                                      'created_at as Created')
                             ->orderBy($column, $direction)
                             ->paginate(10);

        return response()->json($products);

    }

    // End Product Api Methods


}
