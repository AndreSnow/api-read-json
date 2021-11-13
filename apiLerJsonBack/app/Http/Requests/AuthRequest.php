<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'string|min:3|',
            'email' => 'string|email|min:3|unique:users,email,{$this->id},id',
        ];

        if ($this->isMethod('POST')) {
            $rules['name'] = 'required|string|min:3|';
            $rules['email'] = 'required|string|email|min:3|unique:users,email,{$this->id},id';
            $rules['password'] = 'required|';
        }

        return $rules;
    }
}
