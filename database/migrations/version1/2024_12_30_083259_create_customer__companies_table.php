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
        Schema::create('customer__companies', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('company_id');
            $table->integer('created_by');
            $table->boolean('is_active')->default(true);
            $table->string('image')->nullable();
            $table->uuid();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer__companies');
    }
};
