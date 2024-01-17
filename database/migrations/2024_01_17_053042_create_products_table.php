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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('subcat_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->string('slug')->unique;
            $table->string('buy_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->text('short_des')->nullable();
            $table->longText('long_des')->nullable();
            $table->string("product_type")->nullable();
            $table->string('product_code')->nullable();
            $table->string('image')->nullable();
            $table->string('hot_offer')->nullable();
            $table->string('special_offer')->nullable();
            $table->enum('status',['active','inactive','pending'])->default('inactive');
            $table->integer('vendor_id')->nullable()->comment("in future");
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcat_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
