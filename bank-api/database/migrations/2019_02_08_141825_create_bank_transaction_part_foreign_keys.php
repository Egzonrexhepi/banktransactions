<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTransactionPartForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_transaction_part', function (Blueprint $table) {
            $table->foreign('bank_transaction_id')->references('id')->on('bank_transaction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_transaction_part', function (Blueprint $table) {
            $table->dropForeign('bank_transaction_part_bank_transaction_id');
        });
    }
}
