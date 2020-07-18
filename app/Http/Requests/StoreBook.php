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
			'isbn' => 'required|max:255',
			'email' => 'required|max:255',
			'author_name' => 'required|max:255',
			'abstract' => 'required|max:255',
			'pages' => 'required|integer',
		];
    }
}
