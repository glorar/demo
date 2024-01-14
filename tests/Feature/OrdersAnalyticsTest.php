<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrdersAnalyticsTest extends TestCase
{
    use RefreshDatabase;
    private const STRUCTURE = [
        'status',
        'total',
        'products_ordered',
        'famous_users',
        'famous_products',
        'most_expensive',
        'most_cheap'
    ];
    /**
     * A basic feature test example.
     */
    public function testOrderStructure(): void
    {
        Order::factory(20)->create();
        User::factory(20)->create();

        $response = $this->get('api/orders/analytic');

        $response->assertStatus(200);
        $response->assertJsonStructure(self::STRUCTURE);
        $response->assertJson(['status' => 'success']);
        $response->assertJson(['total' => 20]);
        $response->assertJsonCount(10, 'famous_users');
        $response->assertJsonCount(15, 'famous_products');
        $response->assertJsonCount(5, 'most_expensive');
        $response->assertJsonCount(5, 'most_cheap');
    }
}
