<?php

namespace App\Model;


class BookService
{
	/** @var  Book */
	public $books;


	public function construct(Book $books)
	{
		$this->books = $books;
	}


	public function test()
	{
		dd($this->books);
	}

}
