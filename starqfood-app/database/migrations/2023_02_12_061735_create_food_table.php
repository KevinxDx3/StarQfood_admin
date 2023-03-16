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
        Schema::create('foods', function (Blueprint $table) {
            $table->id('food_id');
            $table->tinyInteger('category_id_fk',false,true);
            $table->string('food_name',40);
            $table->decimal('cost',5);
            $table->string('wait_time',3)->nullable();
            $table->boolean('visibility');
            $table->unsignedBigInteger('ruc_fk');
            $table->foreign('ruc_fk')
                ->references('ruc')
                ->on('restaurants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('category_id_fk')
                ->references('category_id')
                ->on('food_categories')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('food');
    }
};
