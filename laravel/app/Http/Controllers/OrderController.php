<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        // Get all orders from the database
        $orders = Order::all();

        // Return a response with the list of orders
        return response()->json($orders);
    }
    
}