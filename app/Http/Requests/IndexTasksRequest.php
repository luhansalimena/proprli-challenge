<?php

namespace App\Http\Requests;

use App\Enum\TasksStatusesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexTasksRequest extends FormRequest
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
            'building_id' => 'integer|exists:buildings,id',
            'status' => [
                'string',
                Rule::in(array_column(TasksStatusesEnum::cases(), 'name')),
            ],
            'created_at' => 'array',
            'created_at.from' => 'date|required_with:created_at.to',
            'created_at.to' => 'date|required_with:created_at.from',
        ];
    }
}
