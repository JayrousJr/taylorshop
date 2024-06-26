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
            $table->string('name');
            $table->string('cost');
            $table->string('category');
            $table->foreign('category')
                ->references('name')
                ->on('categories')
                ->onDelete('Cascade')
                ->onUpdate('Cascade');
            $table->string('cat_slug');
            $table->string('quantity');
            $table->string('image');
            $table->string('discription', 500);
            $table->timestamps();
            $table->softDeletes();
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
