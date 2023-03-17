<?php

namespace App\Http\Requests;

use App\Enums\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|min:2',
            'description' => 'sometimes|string|min:2',
            'status' => [
                'sometimes',
                new Enum(TaskStatus::class),
            ],
        ];
    }
}
