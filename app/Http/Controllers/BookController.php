<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Model\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{


	public function index(Request $request)
	{
		$book = Book::orderBy('title', 'asc')->orderBy('title', 'asc')->orderBy('created_at', 'desc');

		if( $request->has('title') )
		{
			$book->where('title', 'like', '%' . $request->get('title') . '%');
		}

		return view('book.index', [
			'title' => 'Zoznam kníh',
			'books' => $book->paginate(2),
		]);
	}


	public function detail($id)
	{
		$book = Book::where('id', (int)$id)->first();

		return view('book.detail', [
			'book' => $book,
		]);
	}


	public function create($id = NULL)
	{
		//$bookService->test();
		$book = $id ? Book::where('id', $id)->first() : new Book();
		return view('book.create', ['book' => $book, 'id' => $id]);
	}


	public function store(StoreBook $request)
	{
		$values = $request->all();

		if ($request->hasFile('image'))
		{
			$file = $request->file('image');
			$fileName = $file->hashName();

			$file->store(Book::IMAGE_PATH, 'public');
			$values['img'] = $fileName;
		}

		$book = Book::create($values);

		return redirect()->route('book.detail', ['id' => $book->id]);
	}


	public function update(StoreBook $request, $id)
	{
		$values = $request->all();
		/** @var Book $book */
		$book = Book::where('id', $id)->first();

		if ($request->hasFile('image'))
		{
			$file = $request->file('image');
			$fileName = $file->hashName();

			$file->store(Book::IMAGE_PATH, 'public');
			$values['img'] = $fileName;

			// Delete prev. file
			if( $book->img ) Storage::delete('public/' . Book::IMAGE_PATH . '/' . $book->img);
		}

		$book->update($values);

		return redirect()->route('book.detail', ['id' => $book->id]);
	}
}
