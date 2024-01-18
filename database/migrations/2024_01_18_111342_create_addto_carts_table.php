<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addto_carts', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->nullable();
            $table->integer("product_id")->nullable();
            $table->string("product_name")->nullable();
            $table->integer("qty")->nullable();
            $table->float("price")->nullable();
            $table->string("image")->nullable();
            $table->string("ip_address")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addto_carts');
    }
};
