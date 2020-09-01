<?php

namespace App\Http\Controllers;


use App\Model\Book;
use App\Model\Services\BookService;
use App\Model\Services\BookSearchFilterService;
use Illuminate\Cache\Events\CacheHit;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{


	public function index(BookSearchFilterService $searchFilterService)
	{
		$books = Book::orderBy('title', 'asc')->orderBy('created_at', 'desc');

		$searchFilterService->setFilter($books);

		return view('book.index', [
			'title' => 'Zoznam kníh',
			// with + look at Lazy eager loading https://laravel.com/docs/7.x/eloquent-relationships#lazy-eager-loading
			'books' => $books->with('user')->paginate(6)->appends(request()->query()),  // query() prida do paginatora get parametre
		]);
	}


	public function detail(Book $book)  // Look at the Book getRouteKey()
	{
		//dd(storage_path('test1.txt'));
		try
		{
			throw new \Exception('exceeeeeeeeeeeeeeption');
		}
		catch( \Exception $e )
		{
			Log::debug($e);
		}


		return view('book.detail', [
			'book' => $book,
			//'book' => Book::where('slug', $slug)->first(),
		]);
	}


	public function create($id = NULL)
	{
		$book = $id ? Book::where('id', $id)->first() : new Book();

		if( !aUser() || ($id && aUser()->cannot('update', $book)) )
		{
			flash('Access denied! You don\'t have a permission for this action.')->important()->error();
			return redirect()->back();
		}
		return view('book.create', ['book' => $book, 'id' => $id]);
	}


	public function store(BookService $bookService)
	{
		$book = $bookService->storeBook();
		flash('New book was successfully created.')->important();
		return __redirectRoute('book.detail', ['slug' => $book->slug]);
	}


	public function update(BookService $bookService, $id)
	{
		$book = $bookService->updateBook($id);
		flash('The book was successfully updated.')->important();
		return __redirectRoute('book.detail', ['slug' => $book->slug]);
	}

}
