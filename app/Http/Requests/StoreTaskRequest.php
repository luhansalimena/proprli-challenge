<?php

namespace App\Http\Requests;

use App\Enum\TasksStatusesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
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
            'title' => 'required|string',
            'status' => [
                'string',
                Rule::in(array_column(TasksStatusesEnum::cases(), 'name')),
            ],
            'user_id' => 'integer|exists:users,id',
            'building_id' => 'integer|exists:buildings,id',
        ];
    }
}
