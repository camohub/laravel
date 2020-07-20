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
			$table->string('title', 255)->index('books_title_idx');
			$table->string('isbn', 30)->index('books_isbn_idx');
			$table->string('genre', 30)->index('books_genre_idx');
			$table->string('abstract', 255);
			$table->string('pages');
			$table->string('author_name', 30);
			$table->string('email', 30);
			$table->string('img', 100)->nullable(TRUE);
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
