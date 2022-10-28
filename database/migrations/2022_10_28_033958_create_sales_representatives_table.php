<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_representatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_manager_id')->constrained('users');
            $table->foreignId('current_working_route_id')->constrained('working_routes');
            $table->string('full_name');
            $table->string('email', 200);
            $table->string('telephone', 25);
            $table->date('joined_date');
            $table->longText('comment')->nullable();
            $table->index(['email', 'telephone']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_representatives');
    }
};
