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
        Schema::create('loan_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('maturity');
            $table->string('plan');
            $table->string('interest');
            $table->integer('grace_period');
            $table->integer('loan_repayment_id');
            $table->integer('company_id');
            $table->integer('created_by');
            $table->boolean('status')->default(true);
            $table->uuid();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_types');
    }
};
