<?php

namespace App\Http\Requests\Admin;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EpisodeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'Status' => [
                'required',
                Rule::in(Status::toCollection()->keys()),
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
