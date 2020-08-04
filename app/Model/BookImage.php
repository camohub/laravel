<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{

	public $timestamps = FALSE;


	const IMAGE_PATH = 'book/images';


	protected $fillable = [
		'file', 'book_id', 'main'
	];


	public function book()
	{
		return $this->belongsTo(Book::class);
	}

}
