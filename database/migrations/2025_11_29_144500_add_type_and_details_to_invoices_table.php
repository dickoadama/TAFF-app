<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('type')->default('invoice'); // invoice, credit, refund
            $table->string('credit_type')->nullable(); // incoming, outgoing
            $table->string('refund_type')->nullable(); // refund, withdrawal
            $table->text('client_full_name')->nullable();
            $table->text('client_contact')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn(['type', 'credit_type', 'refund_type', 'client_full_name', 'client_contact']);
        });
    }
};