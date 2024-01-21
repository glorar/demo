<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class OrderAnalyticService
{
    private const USERS_LIMIT = 10;
    private const PRODUCTS_LIMIT = 15;
    private const PRODUCTS_CATEGORY_LIMIT = 5;
    public function handler(): array
    {
        try {
            return [
                'status' => 'success',
                'total' => $this->ordersCount(),
                'products_ordered' => $this->productsOrdered(),
                'famous_users' => $this->famousUsers(),
                'famous_products' => $this->famousProducts(),
                'most_expensive' => $this->expensiveProducts(),
                'most_cheap' => $this->cheapProducts()
            ];
        } catch (\Exception $exception) {
            return [
                'status' => 'fail',
                'message' => $exception->getMessage()
            ];
        }
    }

    private function ordersCount(): int
    {
        return Order::all()->count();
    }

    private function productsOrdered(): int
    {
        return Order::distinct()->count('product_id');
    }

    private function famousUsers(): array
    {
        $users = User::select('id', 'name')
            ->limit(self::USERS_LIMIT)
            ->get();

        return $users->toArray();
    }

    private function famousProducts(): array
    {
        $products = Product::select('id', 'name')
            ->limit(self::PRODUCTS_LIMIT)
            ->get();

        return $products->toArray();
    }

    private function expensiveProducts(): array
    {
        $products = Product::orderBy('price', 'desc')
            ->select('id', 'name', 'price')
            ->limit(self::PRODUCTS_CATEGORY_LIMIT)
            ->get();

        return $products->toArray();
    }

    private function cheapProducts(): array
    {
        $products = Product::orderBy('price')
            ->select('id', 'name', 'price')
            ->limit(self::PRODUCTS_CATEGORY_LIMIT)
            ->get();

        return $products->toArray();
    }
}
