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
        Schema::create('loan_workflows', function (Blueprint $table) {
            $table->id();
            $table->integer('loan_application_id');
            $table->integer('workflow_module_id');
            $table->integer('status');
            $table->boolean('is_complete')->default(false);
            $table->date('complete_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_workflows');
    }
};
