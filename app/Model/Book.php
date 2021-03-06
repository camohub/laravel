<?php

namespace App\Model;


use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Book extends Model
{

	const IMAGE_PATH = 'book/images';


	protected $fillable = [
		'user_id', 'title', 'slug', 'genre', 'isbn', 'author_name', 'email', 'abstract', 'pages', 'img'
	];

	/**
	 * This injects model to controller methods via slug
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'slug';
	}


	public function user()
	{
		return $this->belongsTo(User::class);
	}


	public function getTestAttribute()
	{
		return 'aaaaaaaaaaaaaaaaaaaaaaaaaaa';
	}


	public function images()
	{
		return $this->hasMany(BookImage::class);
	}


}
