<?php

namespace App\Http\Requests\Admin;

use App\Enums\Status;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        /** @var ?User */
        $user = Request::route('user', null);

        $email_unique = Rule::unique(User::class, 'email');
        $password_rules = [
            'exclude',
        ];

        if (is_null($user)) {
            $password_rules = [
                'required',
                'string',
                'regex:/\A[!-~]+\z/',
                'min:8',
            ];
        } else {
            $email_unique->ignore($user->id, 'id');
        }

        $rules = [
            'name' => [
                'required',
                'string',
                'max:32',
            ],
            'password' => $password_rules,
            'email' => [
                'required',
                'email:strict,dns',
                'max:255',
                $email_unique,
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

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'name' => 'ユーザ名',
            'email' => 'メールアドレス',
            'email_verified_at' => 'メールアドレス認証',
            'password' => 'パスワード',
            'Status' => 'ステータス',
        ];
    }
}
