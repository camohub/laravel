<?php

namespace App\Model\Services;


use App\Http\Requests\StoreBook;
use App\Model\Book;
use App\Model\BookImage;
use App\Model\BookImages;
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

		$book = Book::create( $values );

		$this->storeImages($book);

		//if( $fileName ) $values['img'] = $fileName;
		//$book = Book::create( $values );

		return $book;
	}


	public function updateBook($id)
	{
		$values = $this->request->all();
		$values['slug'] = Str::slug($values['title']);
		$values['user_id'] = Auth::user()->id;

		/** @var Book $book */
		$book = Book::where('id', $id)->first();

		$this->storeImages( $book );

		$book->update( $values );

		return $book;
	}


	private function storeImages( Book $book = NULL )
	{
		if( $this->request->hasFile('images') )
		{
			foreach ( $this->request->file('images') as $image )
			{
				$fileName = $image->hashName();
				$image->store(Book::IMAGE_PATH, 'public');

				try
				{
					$bookImage = new BookImage();
					$bookImage->file = $fileName;
					$bookImage->book_id = $book->id;
					$bookImage->save();
				}
				catch( \Exception $e )
				{
					Storage::delete('public/' . Book::IMAGE_PATH . '/' . $fileName);
					throw $e;
				}

				// Delete prev. file
				//if( $book && $book->img ) Storage::delete('public/' . Book::IMAGE_PATH . '/' . $book->img);

				//return $fileName;
			}
		}

		return NULL;
	}

}
