<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'category' => 'required|exists:categories,id',
                    'title' => 'required|max:255|unique:threads,title',
                    'body' => 'required|max:1000'
                ];
                break;

            case 'PUT':
            case 'PATCH':
                return [
                    'category' => 'required|exists:categories,id',
                    'title' => 'required|max:255|unique:threads,title,'.$this->thread->id,
                    'body' => 'required|max:1000'
                ];
                break;
        }
    }
}
