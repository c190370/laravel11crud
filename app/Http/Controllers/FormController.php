<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FormController extends Controller
{
    public function search_data(Request $request)
    {
        $data = $request->input('search');
        $products = DB::table('products')
            ->where('name', 'like', '%' . $data . '%')
            ->orWhere('sku', 'like', '%' . $data . '%')
            ->orWhere('id', 'like', '%' . $data . '%')
            ->orWhere('price', 'like', '%' . $data . '%')
            ->orWhere('description', 'like', '%' . $data . '%')
            ->orWhere('created_at', 'like', '%' . $data . '%')
            ->get();

        return view('list', compact('products'));
    }


    public function product()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

}
