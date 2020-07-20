<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;


class Book extends Model
{

	const IMAGE_PATH = 'book/images';


	protected $fillable = [
		'title', 'genre', 'isbn', 'author_name', 'email', 'abstract', 'pages', 'img'
	];


}
