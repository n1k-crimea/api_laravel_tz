<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rulesCreate = [
            'name' => 'required|max:255',
            'status' => 'required|integer|between:0,1',
            'deadline' => 'required|date',
        ];

        $rulesUpdate = [
            'name' => 'nullable|max:255',
            'status' => 'nullable|integer|between:0,1',
            'deadline' => 'nullable|date',
        ];

        return match ($this->getMethod()) {
            'POST' => $rulesCreate,
            'PATCH', 'PUT' => $rulesUpdate,
            default => [],
        };
    }
}
