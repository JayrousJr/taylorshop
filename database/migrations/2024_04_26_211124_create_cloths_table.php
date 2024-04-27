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
        Schema::create('cloths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('cloth_types');
            $table->string('image');
            $table->string('status')->boolean();
            // $table->string('name');
            // $table->string('cost');
            // $table->string('size');
            // $table->string('type');
            // $table->text('description');
            // relationships
            // $table->foreign('name')
            //     ->references('name')->on('cloths');
            // $table->foreign('cost')
            //     ->references('cost')->on('cloths');
            // $table->foreign('size')
            //     ->references('size')->on('cloths');
            // $table->foreign('type')
            //     ->references('type')->on('cloths');
            // $table->foreign('description')
            //     ->references('description')->on('cloths');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloths');
    }
};
