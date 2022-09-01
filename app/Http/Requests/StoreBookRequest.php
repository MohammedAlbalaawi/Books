<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                // book information
                'title' => ['required', 'max:255'],
                'author_id' => ['required', 'integer', Rule::exists('authors', 'id')],
                // book details information
                'year' => ['required'],
                'image' => ['required', 'file', 'image', 'mimes:jpg,bmp,png'],
                'department_id' => ['required', 'integer', Rule::exists('departments', 'id')],
                'language' => ['required'],
            ];
        }
        if ($this->isMethod('put')) {
            return [
                // book information
                'title' => ['required', 'max:255'],
                'author_id' => ['required', 'integer', Rule::exists('authors', 'id')],
                // book details information
                'year' => ['required'],
                'department_id' => ['required', 'integer', Rule::exists('departments', 'id')],
                'language' => ['required'],
            ];
        }
    }
}
