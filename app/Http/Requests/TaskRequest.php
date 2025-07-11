<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:80',
            'description' => 'nullable|string|max:250',
            'category' => 'required|string|in:urgent,mid,least urgent',
            'state' => 'required|string|in:pending,completed,deleted',
            'end_date' => 'nullable|date',
        ];
    }
}
