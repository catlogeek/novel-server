<?php

namespace App\Http\Requests\Admin;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EpisodeSearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => [
                'nullable',
                'uuid',
            ],
            'story_id' => [
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
