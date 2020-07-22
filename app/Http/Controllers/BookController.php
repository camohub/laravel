<?php

namespace App\Http\Controllers;


use App\Model\Book;
use App\Model\Services\BookService;
use App\Model\Services\BookSearchFilterService;


class BookController extends Controller
{

	public function index( BookSearchFilterService $searchFilterService)
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
