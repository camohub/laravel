<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('books', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->charset = 'utf8';
			$table->collation = 'utf8_slovak_ci';
			$table->bigIncrements('id');
			$table->string('title')->index('books_title_idx');
			$table->string('isbn')->index('books_isbn_idx');
			$table->string('genre')->index('books_genre_idx');
			$table->string('abstract');
			$table->string('pages');
			$table->string('author_name');
			$table->string('email');
			$table->string('img')->nullable(TRUE);
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
