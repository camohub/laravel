<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Model\Book;
use App\Model\BookService;
use Illuminate\Http\Request;


class BookController extends Controller
{


	public function index()
	{
		//$books = DB::table('books')->orderBy('title', 'asc')->get();
		return view('book.index', [
			'title' => 'This is title',
			'content' => 'This is content',
			'books' => Book::orderBy('title', 'asc')->paginate(2),
		]);
	}


	public function detail($id)
	{
		$book = Book::where('id', (int)$id)->first();

		return view('book.detail', [
			'book' => $book,
		]);
	}


	public function create(BookService $bookService)
	{
		$bookService->test();
		return view('book.create');
	}

	public function store(StoreBook $request)
	{
		//dd($request->all());
		Book::create($request->all());

		if ($request->hasFile('image')) {
			$path = $request->file('image')->store('storage/book/images');
		}


		return redirect()->route('book.index');
	}

	public function update(Request $request, $id)
	{
		dd($request->all());
	}
}
