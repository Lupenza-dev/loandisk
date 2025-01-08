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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->integer('id_type_id');
            $table->string('id_number');
            $table->date('dob');
            $table->integer('gender_id');
            $table->integer('maritial_status_id');
            $table->integer('region_id');
            $table->integer('district_id');
            $table->string('location');
            $table->string('customer_code')->nullable();
            $table->boolean('is_active')->default(true);
            $table->uuid()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
