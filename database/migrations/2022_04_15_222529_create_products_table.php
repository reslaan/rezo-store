<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable();
            $table->string('sku')->unique()->nullable();
            $table->decimal('price',10,2)->unsigned()->default(0);
            $table->decimal('selling_price',10,2)->unsigned()->nullable();
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands')->onDelete('set null');
            $table->boolean('manage_stock')->default(false);
            $table->integer('qty')->nullable()->default(0);
            $table->boolean('in_stock')->default(false);
            $table->integer('viewed')->unsigned()->default(0);
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('products');
    }
}
