<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:50'],
            'description' => ['nullable', 'max:200'],
            'status_id' => Rule::exists('task_statuses', 'id'),
            'assigned_to_id' => ['nullable', Rule::exists('users', 'id')],
            'labels_id' => ['nullable', Rule::exists('labels', 'id')],
        ];
    }
}
