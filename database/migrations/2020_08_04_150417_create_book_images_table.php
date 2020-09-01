<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_images', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8';
			$table->collation = 'utf8_slovak_ci';
            $table->bigIncrements('id');
			$table->unsignedBigInteger('book_id')->nullable()->index();//->after('id'); // error in MariaDB
			$table->foreign('book_id')->references('id')->on('books')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('file', 255);
            $table->boolean('main')->default(FALSE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_images');
    }
}
