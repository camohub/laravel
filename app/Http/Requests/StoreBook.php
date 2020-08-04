<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreBook extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return TRUE;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'title' => 'required|max:255|unique:books',
			'isbn' => 'required|max:30',
			'email' => 'required|email|max:30',
			'author_name' => 'required|max:30',
			'abstract' => 'required|max:255',
			'genre' => 'required|max:30',
			'pages' => 'required|integer|min:10',
		];

		if( $this->getMethod() == 'PUT' )
		{
			$rules['title'] = 'required|max:255';
		}
		if ( $this->hasFile('images') )
		{
			$rules['images.*'] = 'required|image';
		}

		return $rules;
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'title.required' => 'forms.createBook.title_required',
			'title.max' => 'forms.createBook.title_max',
			'title.unique' => 'forms.createBook.title_unique',
			'isbn.required' => 'forms.createBook.isbn_required',
			'isbn.max' => 'forms.createBook.isbn_max',
			'email.required' => 'forms.createBook.email_required',
			'email.email' => 'forms.createBook.email_email',
			'email.max' => 'forms.createBook.email_max',
			'author_name.required' => 'forms.createBook.author_name_required',
			'author_name.max' => 'forms.createBook.author_name_max',
			'abstract.required' => 'forms.createBook.abstract_required',
			'abstract.max' => 'forms.createBook.abstract_max',
			'genre.required' => 'forms.createBook.genre_required',
			'genre.max' => 'forms.createBook.genre_max',
			'pages.required' => 'forms.createBook.pages_required',
			'pages.integer' => 'forms.createBook.pages_integer',
			'pages.min' => 'forms.createBook.pages_min',
			'images.*.image' => 'forms.createBook.image_image',
		];
	}

	/**
	 * @param $validator
	 */
	public function withValidator($validator)
	{
		$validator->after(function ($validator)
		{
			if ( $this->hasFile('images') )
			{
				foreach ( $this->file('images') as $image )
				{
					if( ! $image->isValid() ) $validator->errors()->add('images', 'forms.createBook.image_valid');
				}
			}
		});
	}
}
