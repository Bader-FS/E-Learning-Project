<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCourseRequest extends FormRequest
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
            'domain_id' => 'required|exists:App\Models\Domain,id',
            'prof_id' => 'required|exists:App\Models\Prof,id',
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'price' => 'required',
            'selling_price' => 'required',
            'image' => 'image',
            'duration' => 'required',
            'language' => 'required',
            'map_keywords' => 'required',
        ];
    }
}
