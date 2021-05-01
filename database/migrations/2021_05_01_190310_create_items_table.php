<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('items')) {
            // テーブルが存在していればリターン
            return;
        }
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_name');
            $table->string('color');
            $table->string('size');
            $table->string('brand');
            $table->integer('frequency');
            $table->integer('category');
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('items');
    }
}
