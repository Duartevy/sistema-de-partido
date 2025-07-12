<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VereadorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'partido_id' => 'required|exists:partidos,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
