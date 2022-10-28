<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class SalesRepresentativeTest extends TestCase
{
    protected string $route = "/dashboard/sales-representatives";

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_current_user_sales_representatives(): void
    {
        $salesManager = User::first();
        $response = $this->actingAs($salesManager)->get($this->route);
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_return_sales_manager_to_login_when_they_are_unauthorized(): void
    {
        $response = $this->get($this->route);
        $response->assertStatus(302)->assertRedirect('login');
    }

    public function test_does_it_return_validation_errors_when_creating_a_sales_representative_without_payload()
    {
        //https://stackoverflow.com/questions/57036898/laravel-5-8-nova-login-test-session-is-missing-expected-key-errors
        $salesManager = User::first();
        $response = $this->actingAs($salesManager)->withHeaders(['Accept' => 'application/json'])->post($this->route);
        $response->assertJsonValidationErrors(['email', 'full_name', 'telephone', 'joined_date', 'current_working_route_id'])
            ->assertStatus(422);
    }
}
