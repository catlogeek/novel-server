<?php

namespace App\Http\Requests\Admin;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserSearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => [
                'nullable',
                'uuid',
            ],
            'Status' => [
                'nullable',
                Rule::in([
                    Status::Enable->value,
                    Status::Ban->value,
                ]),
            ],
        ];
    }
}
