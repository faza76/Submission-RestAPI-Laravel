<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client;
use App\Cart;
use App\CartItem;
use App\Product;
use App\Order;


class CartController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function checkout($cart_id)
    {
        $cart = CartItem::where('cart_id',$cart_id)->get();
        $totalPrice = 0;
        foreach ($cart as $cartItem) {
            $product = Product::find($cartItem->product_id);

            $temp_stock = $product->stock - $cartItem->quantity;
            $product->stock = $temp_stock;
            $product->update();        
            $totalPrice += $cartItem->price;

        }

        $order = new Order();
        $order->total_price = $totalPrice;
        $order->cart_id = $cart_id;
        $order->save();

        return response()->json([
            'message' => 'Checkout successfully, Here the detail of your orders :',
            'Order' => $order,
        ], 302);
    }

    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if ($product->stock < $request->quantity) {
            return response()->json(['message' => 'Product stock is insufficient'], 400);
        }

        // Get the current cart or create a new one if it doesn't exist
        $cart = Cart::find($request->cart_id);
        if (!$cart) {
            $cart = new Cart();
            $cart->save();        
        }

        $cartItem = new CartItem();
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->id;
        $cartItem->quantity = $request->input('quantity');
        $cartItem->price = $product->price * $cartItem->quantity;
        $cartItem->description = $request->input('description');
        $cartItem->save();

        $cartList = CartItem::where('cart_id',$request->cart_id)->get();

        return response()->json([
            'message' => 'Product added to cart, Here you cart list :',
            'cart list' => $cartList,
        ], 201);
    }

    


}