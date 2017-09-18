<?php

namespace App\Http\Requests;

use App\Http\Requests\BookRequest;

class StoreBookRequest extends BookRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'nullable|max:13',
            'image' => 'nullable|file|image',
            'publication_date' => 'nullable|date',
        ];
    }
}
