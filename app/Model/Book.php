<?php

namespace App\Model;


use App\User;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{

	const IMAGE_PATH = 'book/images';


	protected $fillable = [
		'user_id', 'title', 'genre', 'isbn', 'author_name', 'email', 'abstract', 'pages', 'img'
	];


	public function user()
	{
		return $this->belongsTo(User::class);
	}


}
