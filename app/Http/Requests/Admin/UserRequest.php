<?php

namespace App\Http\Requests\Admin;

use App\Enums\Status;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read User $user
 */
class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:32',
            ],
            'email' => [
                'required',
                'email:strict,dns',
                'max:255',
                Rule::unique(User::class, 'email')->ignoreModel($this->user),
            ],
            'email_verified_at' => [
                'nullable',
                'date',
            ],
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
            'name' => 'ユーザ名',
            'email' => 'メールアドレス',
            'email_verified_at' => 'メールアドレス認証',
            'Status' => 'ステータス',
        ];
    }
}
