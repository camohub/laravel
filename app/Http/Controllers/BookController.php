<?php

namespace App\Http\Controllers;


use App\Model\Book;
use App\Model\Services\BookService;
use App\Model\Services\BookSearchFilterService;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{

	public function index(BookSearchFilterService $searchFilterService)
	{
		$book = Book::orderBy('title', 'asc')->orderBy('created_at', 'desc');

		$searchFilterService->setFilter($book);

		return view('book.index', [
			'title' => 'Zoznam kníh',
			'books' => $book->with('user')->paginate(6),
		]);
	}


	public function detail($slug)
	{
		return view('book.detail', [
			'book' => Book::where('slug', $slug)->first(),
		]);
	}


	public function create($id = NULL)
	{
		$book = $id ? Book::where('id', $id)->first() : new Book();

		if( !Auth::user() || ($id && !Auth::user()->can('update', $book)) )
		{
			flash('Access denied! You don\'t have a permission for this action.')->important()->error();
			return redirect()->back()->with('alertDanger', 'Access denied!');
		}
		return view('book.create', ['book' => $book, 'id' => $id]);
	}


	public function store(BookService $bookService)
	{
		$book = $bookService->storeBook();
		flash('New book was successfully created.')->important();
		return redirect()->route('book.detail', ['slug' => $book->slug]);
	}


	public function update(BookService $bookService, $id)
	{
		$book = $bookService->updateBook($id);
		flash('The book was successfully updated.')->important();
		return redirect()->route('book.detail', ['slug' => $book->slug]);
	}

}
