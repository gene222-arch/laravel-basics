<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // required, integer, boolean, min:5, max:100, string, date
        return [
            'title' => ['required', 'string', 'min:5', 'unique:posts,title'],
            'body'  => ['required', 'string', 'min:10']
        ];
    }
}
