<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creatures', function (Blueprint $table) {
            $table->id();
            $table->string('type', 15)->default('Land');
            $table->string('name')->unique();
            $table->string('class');
            $table->string('rank')->default('Limited Edition');
            $table->string('breed')->default('General');
            $table->string('sp_1')->nullable()->comment('only for hybrids');
            $table->string('sp_2')->nullable()->comment('only for hybrids');
            $table->integer('hp');
            $table->integer('attack');
            $table->unsignedDecimal('ferocity')->virtualAs('hp+3.2*attack');
            $table->integer('cost')->nullable();
            $table->string('cost_type')->default('N\\A')->comment('In case of S-DNA, the Species');
            $table->unsignedDecimal('stars')->nullable()->comment('In case of hybrid, x+y*2/1.5');
            $table->boolean('status')->default('0');
            $table->text('get')->nullable();
            $table->integer('max')->default('0')->nullable()->comment('Max level acquired');
            $table->integer('total')->default('0')->comment('Total collected');
            $table->string('hybrid')->nullable();
            $table->string('card')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creatures');
    }
}
