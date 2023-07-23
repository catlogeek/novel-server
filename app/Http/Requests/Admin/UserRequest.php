<?php

namespace App\Http\Requests\Admin;

use App\Enums\Status;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read User|null $user
 */
class UserRequest extends FormRequest
{
    public function rules(): array
    {
        $email_unique = Rule::unique(User::class, 'email');
        if (!is_null($this->user)) {
            $email_unique->ignoreModel($this->user, 'id');
        }

        if (is_null($this->user)) {
            $password_rules = [
                'required',
                'string',
                'regex:/\A[!-~]+\z/',
                'min:8',
            ];
        } else {
            $password_rules = ['exclude'];
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
