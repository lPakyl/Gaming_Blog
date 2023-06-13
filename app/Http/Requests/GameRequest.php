<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
        return [
            'title' => 'required|min:3|max:50',
            'producer' => 'required|max:100',
            'cover' => 'required|image',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
                    'title.required' => 'Devi inserire il titolo del videogame',
                    'title.min' => 'Il titolo deve essere di almeno tre caratteri',
                    'title.max' => 'Il titolo deve essere di massimo cinquanta caratteri',
                    'cover.image' => 'La copertina dev\'essere un\'immagine',
                    'description.required' => 'Devi inderire la sinossi del videogame',
        ];    
    }
}
