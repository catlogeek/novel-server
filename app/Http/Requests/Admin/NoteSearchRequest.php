<?php

namespace App\Http\Requests\Admin;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NoteSearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => [
                'nullable',
                'uuid',
            ],
            'user_id' => [
                'nullable',
                'uuid',
            ],
            'Status' => [
                'nullable',
                Rule::in(Status::toCollection()->keys()),
            ],
        ];
    }
}
