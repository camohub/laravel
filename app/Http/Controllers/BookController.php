<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Model\Book;
use App\Model\BookService;
use Illuminate\Http\Request;


class BookController extends Controller
{

	const SEARCH_SESSION = 'bookSearchForm';


	public function index(Request $request)
	{
		$book = Book::orderBy('title', 'asc')->orderBy('created_at', 'desc');

		$this->setFilter($request, $book);

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


	public function store(StoreBook $request, BookService $bookService)
	{
		$book = $bookService->storeBook();
		return redirect()->route('book.detail', ['id' => $book->id]);
	}


	public function update(StoreBook $request, BookService $bookService, $id)
	{
		$book = $bookService->updateBook($id);
		return redirect()->route('book.detail', ['id' => $book->id]);
	}


	private function setFilter(Request $request, $book)
	{
		$sess = $request->session();
		$titleKey = self::SEARCH_SESSION . '.title';
		$fromKey = self::SEARCH_SESSION . '.from';
		$toKey = self::SEARCH_SESSION . '.to';

		if( $request->has('reset') )
		{
			$this->resetSearchSession($request);
		}
		else
		{
			if( $request->title || $sess->get($titleKey) )
			{
				if( $request->title ) $request->session()->put($titleKey, $request->title);
				$book->where('title', 'like', '%' . $sess->get($titleKey) . '%');
			}
			if( $request->from || $sess->get($fromKey) )  // Here should be some pattern validation
			{
				try
				{
					if( $request->from ) $sess->put( $fromKey, \DateTime::createFromFormat('d.m.Y H:i', $request->from) );
					$book->where('created_at', '>=', $sess->get($fromKey));
				}
				catch( \Exception $e ) {}
			}
			if( $request->to || $sess->get($toKey) )  // Here should be some pattern validation
			{
				try
				{
					if( $request->to ) $sess->put( $fromKey, \DateTime::createFromFormat('d.m.Y H:i', $request->to) );
					$book->where('created_at', '<=', $sess->get($fromKey));
				}
				catch( \Exception $e ) {}
			}
		}
	}

	private function resetSearchSession(Request $request)
	{
		$sessKey = self::SEARCH_SESSION . '.';
		$sess = $request->session();
		$sess->remove($sessKey.'title');
		$sess->remove($sessKey.'from');
		$sess->remove($sessKey.'to');
	}
}
