<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required|exists:users,id',
            'tag_id' => 'required|exists:tags,id',
            'status' => 'required|in:draft,published,archived',
            'views' => 'nullable|integer|min:0',
            'likes' => 'nullable|integer|min:0',
            'dislikes' => 'nullable|integer|min:0',
            

        ];
    }
}
