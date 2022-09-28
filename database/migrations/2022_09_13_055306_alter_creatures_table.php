<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCreaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('creatures', function (Blueprint $table) {
            $table->dropColumn('total');
            $table->after('max', function (Blueprint $table) {
                $table->integer('shop')->default('0')->nullable()->comment('In shop or Level 1-10');
                $table->integer('s2')->default('0')->nullable()->comment('Level 11-20');
                $table->integer('s3')->default('0')->nullable()->comment('Level 21-30');
                $table->integer('sdna')->default('0')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('creatures', function (Blueprint $table) {
            $table->integer('total');
            $table->dropColumn(['shop', 's2', 's3']);
        });
    }
}
