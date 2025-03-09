<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->text('description');
            $table->timestamps();
        });


        Product::insert([
            [
                'name' => 'Addidas Sneakers',
                'price' => 94.99,
                'description' => 'Sneakers made by Addidas'
            ],
            [
                'name' => 'Table',
                'price' => 54.99,
                'description' => 'Rounded Table, made of wood'
            ],
            [
                'name' => 'Dell Laptop',
                'price' => 194.99,
                'description' => 'High Performance, Big Storage'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
