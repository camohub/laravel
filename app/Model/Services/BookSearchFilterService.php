<?php

namespace App\Model\Services;


use Illuminate\Http\Request;


class BookSearchFilterService
{

	const SEARCH_SESSION = 'bookSearchForm';

	/** @var  Request */
	public $request;


	public function __construct(Request $r)
	{
		$this->request = $r;
	}


	public function setFilter($book)
	{
		$sess = $this->request->session();
		$titleKey = self::SEARCH_SESSION . '.title';
		$fromKey = self::SEARCH_SESSION . '.from';
		$toKey = self::SEARCH_SESSION . '.to';

		if( $this->request->has('reset') )
		{
			$this->resetSearchSession();
		}
		else
		{
			if( $this->request->title || $sess->get($titleKey) )
			{
				if( $this->request->title ) $this->request->session()->put($titleKey, $this->request->title);
				$book->where('title', 'like', '%' . $sess->get($titleKey) . '%');
			}
			if( $this->request->from || $sess->get($fromKey) )  // Here should be some pattern validation
			{
				try
				{
					if( $this->request->from ) $sess->put( $fromKey, \DateTime::createFromFormat('d.m.Y H:i', $this->request->from) );
					$book->where('created_at', '>=', $sess->get($fromKey));
				}
				catch( \Exception $e ) {}
			}
			if( $this->request->to || $sess->get($toKey) )  // Here should be some pattern validation
			{
				try
				{
					if( $this->request->to ) $sess->put( $fromKey, \DateTime::createFromFormat('d.m.Y H:i', $this->request->to) );
					$book->where('created_at', '<=', $sess->get($fromKey));
				}
				catch( \Exception $e ) {}
			}
		}
	}

	private function resetSearchSession()
	{
		$sessKey = self::SEARCH_SESSION . '.';
		$sess = $this->request->session();
		$sess->remove($sessKey.'title');
		$sess->remove($sessKey.'from');
		$sess->remove($sessKey.'to');
	}

}
