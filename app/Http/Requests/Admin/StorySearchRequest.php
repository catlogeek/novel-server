<?php

namespace App\Http\Requests\Admin;

use App\Enums\Genre;
use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorySearchRequest extends FormRequest
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
            'Genre' => [
                'nullable',
                Rule::in(Genre::toCollection()->keys()),
            ],
            'Status' => [
                'nullable',
                Rule::in(Status::toCollection()->keys()),
            ],
        ];
    }
}
