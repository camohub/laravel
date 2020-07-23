<?php

namespace App\Model\Services;


use App\Http\Requests\StoreBook;
use App\Model\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BookService
{

	/** @var  Request */
	public $request;


	public function __construct(StoreBook $r)
	{
		$this->request = $r;
	}


	public function storeBook()
	{
		$values = $this->request->all();
		$values['slug'] = Str::slug($values['title']);
		$values['user_id'] = Auth::user()->id;

		$fileName = $this->storeImage();
		if( $fileName ) $values['img'] = $fileName;

		$book = Book::create( $values );

		return $book;
	}


	public function updateBook($id)
	{
		$values = $this->request->all();
		$values['slug'] = Str::slug($values['title']);
		$values['user_id'] = Auth::user()->id;

		/** @var Book $book */
		$book = Book::where('id', $id)->first();

		$fileName = $this->storeImage( $book );
		if( $fileName ) $values['img'] = $fileName;

		$book->update( $values );

		return $book;
	}


	private function storeImage( Book $book = NULL )
	{
		if( $this->request->hasFile('image') )
		{
			$file = $this->request->file('image');
			$fileName = $file->hashName();

			$file->store(Book::IMAGE_PATH, 'public');

			// Delete prev. file
			if( $book && $book->img ) Storage::delete('public/' . Book::IMAGE_PATH . '/' . $book->img);

			return $fileName;
		}

		return NULL;
	}

}
