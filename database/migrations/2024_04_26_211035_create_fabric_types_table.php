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
        Schema::create('fabric_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('cost')->index();
            $table->string('size')->index();
            $table->string('type')->index()->default('fabric');
            $table->text('description')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fabric_types');
    }
};