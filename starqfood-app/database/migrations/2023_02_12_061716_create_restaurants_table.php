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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->unsignedBigInteger('ruc')->unique()->primary();
            $table->tinyInteger('category_id_fk',false,true);
            $table->unsignedBigInteger('user_id_fk')->nullable();
            $table->string('local_name',40);
            $table->string('address',150);
            $table->string('local_email',40)->nullable();
            $table->string('owen',30);
            $table->string('local_tel',7)->nullable();
            $table->string('local_movil',10)->nullable();
            $table->string('description')->nullable();
            $table->decimal('score_local',3)->nullable();
            $table->timestamps();
            $table->foreign('user_id_fk')
                ->references('user_id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('category_id_fk')
                ->references('category_id')
                ->on('restaurant_categories')
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
        Schema::dropIfExists('restaurants');
    }
};
