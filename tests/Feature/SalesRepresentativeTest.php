<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class SalesRepresentativeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_current_user_sales_representatives(): void
    {
        $salesManager = User::first();
        $response = $this->actingAs($salesManager)->get('/dashboard/sales-representatives');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_return_sales_manager_to_login_when_they_are_unauthorized(): void
    {
        $response = $this->get('/dashboard/sales-representatives');
        $response->assertStatus(302)->assertRedirect('login');
    }
}
