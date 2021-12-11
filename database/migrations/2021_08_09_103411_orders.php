<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clint_name');
            $table->string('clint_address');
            $table->string('clint_phone');
            $table->string('glass_type')->nullable();
            $table->string('type')->nullable();
            $table->string('D_R_SPH')->nullable();
            $table->string('D_R_SYL')->nullable();
            $table->string('D_R_AXIS')->nullable();
            $table->string('D_L_SPH')->nullable();
            $table->string('D_L_SYL')->nullable();
            $table->string('D_L_AXIS')->nullable();
            $table->string('D_L_ah1')->nullable();
            $table->string('N_R_SPH')->nullable();
            $table->string('N_R_SYL')->nullable();
            $table->string('N_R_AXIS')->nullable();
            $table->string('N_L_SPH')->nullable();
            $table->string('N_L_SYL')->nullable();
            $table->string('N_L_AXIS')->nullable();
            $table->string('N_L_ah2')->nullable();
            $table->integer('progressive')->nullable();
            $table->integer('bifocal')->nullable();
            $table->integer('sv')->nullable();
            $table->string('IPD')->nullable();
            $table->integer('plase');
            $table->double('prise');
            $table->double('discount')->nullable();
            $table->double('amount_after')->nullable();
            $table->double('payed');
            $table->double('amount_left');
            $table->date('date');
            $table->integer('order_type');
            $table->string('note')->nullable();
            $table->integer('prodect_id')->unsigned();

            $table->timestamps();
            $table->foreign('prodect_id')->references('id')->on('prodects')
            ->onDelete('cascade');
        });   
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
