<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class OrdersController extends Controller
{
    public function analytic(): JsonResponse
    {
        $ordersCount = Order::all()->count();

        $productsOrdered = Order::distinct()->count('product_id');

        $users = User::select('id', 'name')->limit(10)->get();
        $famousUsers = $users->toArray();

        $products = Product::select('id', 'name')->limit(15)->get();
        $famousProducts = $products->toArray();

        $products = Product::orderBy('price', 'desc')->select('id', 'name', 'price')->limit(5)->get();
        $expensiveProducts = $products->toArray();

        $products = Product::orderBy('price')->select('id', 'name', 'price')->limit(5)->get();
        $cheapProducts = $products->toArray();

        return response()->json([
            'status' => 'success',
            'total' => $ordersCount,
            'products_ordered' => $productsOrdered,
            'famous_users' => $famousUsers,
            'famous_products' => $famousProducts,
            'most_expensive' => $expensiveProducts,
            'most_cheap' => $cheapProducts
        ]);
    }
}
