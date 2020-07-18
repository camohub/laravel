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
		return [
			'title' => 'required|max:255',
			'isbn' => 'required|max:30',
			'email' => 'required|email|max:30',
			'author_name' => 'required|max:30',
			'abstract' => 'required|max:255',
			'genre' => 'required|max:30',
			'pages' => 'required|integer|min:10',
		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'title.required' => 'Názov je povinné pole.',
			'title.max' => 'Názov môže mať max 255 znakov.',
			'isbn.required' => 'ISBN je povinné pole.',
			'isbn.max' => 'ISBN môže mať max 30 znakov.',
			'email.required' => 'Email je povinné pole.',
			'email.email' => 'Zadaný email nieje validná emailová adresa.',
			'email.max' => 'Email môže mať max 30 znakov.',
			'author_name.required' => 'Meno autora je povinné pole.',
			'author_name.max' => 'Meno autora môže mať max 30 znakov.',
			'abstract.required' => 'Abstrakt je povinné pole.',
			'abstract.max' => 'Abstrakt môže mať max 255 znakov.',
			'genre.required' => 'Žáner je povinné pole.',
			'genre.max' => 'Žáner môže mať max 30 znakov.',
			'pages.required' => 'Počet strán je povinné pole.',
			'pages.integer' => 'Počet strán nieje číslo.',
			'pages.min' => 'Počet strán nesmie byť menší ako 10. To nieje kniha ale leporelo.',
		];
	}

	/**
	 * @param $validator
	 */
	public function withValidator($validator)
	{
		$validator->after(function ($validator)
		{
			if (!$this->checkFile())
			{
				$validator->errors()->add('field', 'Something is wrong with this field!');
			}
		});
	}


	protected function checkFile()
	{
		return TRUE;
	}
}
