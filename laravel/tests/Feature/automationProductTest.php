<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class automationProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   
    public function testAddToCart()
    {
        $response = $this->post('/api/carts', [
            'cart_id' => "63f8da9e93770000f90025d4",
            'product_id' => "63f8ccf5a4780000880019f4",
            'quantity' => 3,
            'description' => "red color",
        ]);
        
        // Assert that the response has a 201 status code (Object Cart Item Created)
        $response->assertStatus(201);
    }

    public function testCheckout()
    {
        // Create a new product in the database
        // $product = Product::factory()->create([
        //     "name": "Nintendo Switch",
        //     "price": 10,
        //     "description": "a handheld console",
        //     "stock": 10
        // ]);

        // Create a new cart and order in the database

        $cart = $this->post('/api/carts', [
            'cart_id' => "63f8da9e93770000f90025d4",
            'product_id' => $product->id,
            'quantity' => 2,
            'description' => "red color",
        ]);
        
        
        // // Test the checkout functionality
        // $response = $this->post('/cart/checkout', [
        //     'cart_id' => $cart->id;
        // ]);

        // Assert that the response has a 302 status code, indicating a redirect
        $response->assertStatus(302);

        // Assert that the order was created in the database
        $this->assertDatabaseHas('orders', [
            'product_id' => $product->id,
            'quantity' => 2,
            'total_price' => 20.0,
        ]);
    }

    public function testListOrders()
    {
        // Test the order and product listing functionality

        // Create a new product in the database
        // $product = Product::factory()->create([
        //     "name": "Nintendo Switch",
        //     "price": 50,
        //     "description": "a handheld console",
        //     "stock": 10
        // ]);

        // Create a new cart and order in the database

        $response = $this->post('/api/carts', [
            'cart_id' => "63f8da9e93770000f90025d4",
            'product_id' => $product->id,
            'quantity' => 2,
            'description' => "red color",
        ]);

        $order = Order::factory()->create([
            'quantity' => 2,
            'total_price' => 100,
        ]);

    }

    
}
