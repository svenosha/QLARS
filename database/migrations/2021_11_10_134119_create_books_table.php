<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('TbSubj');
            $table->string('TbISBN');
            $table->string('TbPublisher');
            $table->bigInteger('TbForm');
            $table->float('TbPrice');
            $table->string('StdID')->nullable();
            $table->string('TbStatus')->default('New');
            $table->string('TbGen')->default('No');
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
        Schema::dropIfExists('books');
    }
}
