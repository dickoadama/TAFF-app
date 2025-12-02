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
            // Vérifier si les colonnes existent avant de les ajouter
            if (!Schema::hasColumn('invoices', 'operation_type')) {
                $table->string('operation_type')->default('purchase'); // purchase, credit, refund
            }
            
            if (!Schema::hasColumn('invoices', 'credit_status')) {
                $table->string('credit_status')->nullable(); // issued, paid
            }
            
            if (!Schema::hasColumn('invoices', 'refund_status')) {
                $table->string('refund_status')->nullable(); // credit, withdrawal
            }
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
            $table->dropColumn(['operation_type', 'credit_status', 'refund_status']);
        });
    }
};