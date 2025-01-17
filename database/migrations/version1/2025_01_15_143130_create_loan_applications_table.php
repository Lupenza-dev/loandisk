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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('company_id');
            $table->integer('branch_id');
            $table->integer('loan_type_id');
            $table->integer('user_id');
            $table->integer('plan');
            $table->decimal('amount',20,2);
            $table->decimal('loan_amount',20,2)->nullable();
            $table->decimal('fees',10,2)->nullable();
            $table->decimal('interest',10,2)->nullable();
            $table->decimal('current_balance',10,2)->default(0);
            $table->decimal('outstanding_amount',10,2)->default(0);
            $table->decimal('excess_paid_amount',10,2)->default(0);
            $table->date('start_date')->nullable();
            $table->date('expected_end_date')->nullable();
            $table->integer('current_past_due_days')->default(0);
            $table->integer('past_due_days')->default(0);
            $table->decimal('past_due_amount',10,2)->default(0);
            $table->decimal('penalt_amount',10,2)->default(0);
            $table->decimal('penalt_amount_paid',10,2)->default(0);
            $table->date('last_payment_date')->nullable();
            $table->date('next_payment_date')->nullable();
            $table->string('loan_code')->nullable();
            $table->integer('financial_year_id')->nullable();
            $table->integer('status');
            $table->integer('stage');
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
        Schema::dropIfExists('loan_applications');
    }
};
