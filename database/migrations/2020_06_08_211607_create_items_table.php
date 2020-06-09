<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campany_id')->unsigned()->index();
            $table->string('content', 100);
            $table->date('due_date');
            $table->integer('status')->default(1);
            $table->timestamps();
            
            //外部キー制約
            $table->foreign('campany_id')->references('id')->on('campanies');
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
