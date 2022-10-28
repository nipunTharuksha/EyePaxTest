<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WorkingRoute;
use Carbon\Carbon;
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

    /**
     * @return void
     */
    public function test_does_it_return_validation_errors_when_creating_a_sales_representative_without_payload(): void
    {
        //https://stackoverflow.com/questions/57036898/laravel-5-8-nova-login-test-session-is-missing-expected-key-errors
        $salesManager = User::first();
        $response = $this->actingAs($salesManager)->withHeaders(['Accept' => 'application/json'])->post($this->route);
        $response->assertJsonValidationErrors(['email', 'full_name', 'telephone', 'joined_date', 'current_working_route_id'])
            ->assertStatus(422);
    }

    /**
     * @return void
     */
    public function test_that_passing_incorrect_date_format_to_joined_date_return_422(): void
    {
        $salesManager = User::first();
        $response = $this->actingAs($salesManager)->withHeaders(['Accept' => 'application/json'])->post($this->route, [
            'full_name' => fake()->firstName,
            'email' => fake()->email,
            'telephone' => fake()->phoneNumber,
            'joined_date' => '11-11-11',
            'current_working_route_id' => WorkingRoute::first()->id,
        ]);

        $response->assertJsonValidationErrors(['joined_date' => 'The joined date does not match the format Y-m-d.'])
            ->assertStatus(422);
    }

    /**
     * @return void
     */
    public function test_that_passing_date__after_today_to_joined_date_return_422(): void
    {
        $salesManager = User::first();
        $response = $this->actingAs($salesManager)->withHeaders(['Accept' => 'application/json'])->post($this->route, [
            'full_name' => fake()->firstName,
            'email' => fake()->email,
            'telephone' => fake()->phoneNumber,
            'joined_date' => Carbon::now()->addDay()->format('Y-m-d'),
            'current_working_route_id' => WorkingRoute::first()->id,
        ]);

        $response->assertJsonValidationErrors(['joined_date' => 'The joined date must be a date before or equal to now.'])
            ->assertStatus(422);
    }


    /**
     * @return void
     */
    public function test_after_creating_sales_representative_navigate_to_sales_representative_index(): void
    {
        $salesManager = User::first();
        $response = $this->actingAs($salesManager)->withHeaders(['Accept' => 'application/json'])->post($this->route, [
            'full_name' => fake()->firstName,
            'email' => fake()->email,
            'telephone' => fake()->phoneNumber,
            'joined_date' => Carbon::now()->format('Y-m-d'),
            'current_working_route_id' => WorkingRoute::first()->id,
        ]);

        $response->assertStatus(302);
    }
}
