<?php

namespace App\Http\Requests\Admin;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'Status' => [
                'required',
                Rule::in([
                    Status::Enable->value,
                    Status::Ban->value,
                ]),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'Status' => 'ステータス',
        ];
    }
}
