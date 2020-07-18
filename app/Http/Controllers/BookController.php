<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Model\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{


	public function index()
	{
		//$books = DB::table('books')->orderBy('title', 'asc')->get();
		return view('book.index', [
			'title' => 'This is title',
			'content' => 'This is content',
			'books' => Book::orderBy('title', 'asc')->get(),
		]);
	}


	public function detail($id)
	{
		$book = Book::where('id', (int)$id)->first();

		return view('book.detail', [
			'book' => $book,
		]);
	}


	public function create()
	{
		return view('book.create');
	}

	public function store(StoreBook $request)
	{
		redirect(route('book.index'));
	}

	public function update(Request $request, $id)
	{
		dd($request->all());
	}
}
