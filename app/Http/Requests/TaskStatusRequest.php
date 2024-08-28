<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskStatusRequest extends FormRequest
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
                'name' => ['required',
                    'min:3',
                    'max:30',
                    Rule::unique('task_statuses', 'name'),
                ],
            ],
            'PATCH', 'PUT' => [
                'name' => [
                    'required',
                    'min:3',
                    'max:30',
                    Rule::unique('task_statuses', 'name')->ignore($this->route('status')),
                ],
            ],
            default => [],
        };
    }
}
