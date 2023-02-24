<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use MongoDB\Client;


class ProductController extends Controller
{
    public function index()
    {
        
        // $client = new Client();
        // $collection = $client->mydb->mycollection;
        // $result = $collection->find();

        $products = Product::all();

        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        // Return a response indicating success and the new product data
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product,
        ], 201);
    }
    
}