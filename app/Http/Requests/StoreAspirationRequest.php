<?php

namespace App\Http\Requests;

use App\Enums\TanahSarealKelurahan;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAspirationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sender_name' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/'],
            'address' => ['required', 'string', 'max:500'],
            'kelurahan' => ['nullable', 'string', Rule::in(TanahSarealKelurahan::values())],
            'category' => ['nullable', 'string', 'max:100'],
            'subject' => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:5000'],
            'website_hp' => ['nullable', 'string'],
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'sender_name.required' => 'Nama lengkap wajib diisi.',
            'phone_number.required' => 'Nomor WhatsApp aktif wajib diisi.',
            'phone_number.regex' => 'Format nomor WhatsApp tidak valid (contoh: 081234567890).',
            'address.required' => 'Alamat lengkap wajib diisi.',
            'subject.required' => 'Perihal / subjek aspirasi wajib diisi.',
            'description.required' => 'Uraian lengkap aspirasi wajib diisi.',
        ];
    }
}
