<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LabelRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
 */
    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => [
                'name' => ['required', 'min:3', 'max:50', Rule::unique('labels', 'name')],
                'description' => ['max:100'],
            ],
            'PATCH', 'PUT' => [
                'name' => ['required', 'min:3', 'max:50', Rule::unique('labels', 'name')->ignore($this->route('label'))],
                'description' => ['max:100'],
            ],
            default => [],
        };
    }
}
