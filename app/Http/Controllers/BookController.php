<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Model\Book;
use App\Model\BookSearchFilterService;
use App\Model\BookService;
use Illuminate\Http\Request;


class BookController extends Controller
{

	const SEARCH_SESSION = 'bookSearchForm';


	public function index(Request $request, BookSearchFilterService $searchFilterService)
	{
		$book = Book::orderBy('title', 'asc')->orderBy('created_at', 'desc');

		$searchFilterService->setFilter($book);

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
		$book = $id ? Book::where('id', $id)->first() : new Book();
		return view('book.create', ['book' => $book, 'id' => $id]);
	}


	public function store(BookService $bookService)
	{
		$book = $bookService->storeBook();
		return redirect()->route('book.detail', ['id' => $book->id]);
	}


	public function update(BookService $bookService, $id)
	{
		$book = $bookService->updateBook($id);
		return redirect()->route('book.detail', ['id' => $book->id]);
	}

}
