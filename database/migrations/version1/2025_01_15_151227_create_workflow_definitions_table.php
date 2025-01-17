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
        Schema::create('workflow_definitions', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('level');
            $table->integer('user_role_id');
            $table->integer('workflow_module_id');
            $table->integer('company_id');
            $table->integer('branch_id');
            $table->integer('user_id');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_approval');
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
        Schema::dropIfExists('workflow_definitions');
    }
};
