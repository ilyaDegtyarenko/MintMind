<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Pearl\RequestValidate\RequestAbstract;

class Login extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:240',
            'password' => 'required|min:8|max:240',
            'remember' => 'boolean'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => trans('validation.required', [
                'attribute' => mb_strtolower(trans_choice('attributes.email', 'singular-accusative')),
            ]),
            'email.max' => trans_choice('validation.size', 'plural', [
                'attribute' => trans_choice('attributes.email', 'singular'),
                'condition' => trans('validation.more_than'),
                'count' => 240
            ]),
            'email.email' => trans('validation.email'),
            'password.required' => trans('validation.required', [
                'attribute' => mb_strtolower(trans_choice('attributes.password', 'singular')),
            ]),
            'password.min' => trans_choice('validation.size', 'plural', [
                'attribute' => trans_choice('attributes.password', 'singular'),
                'condition' => trans('validation.less_than'),
                'count' => 8
            ]),
            'password.max' => trans_choice('validation.size', 'plural', [
                'attribute' => trans_choice('attributes.password', 'singular'),
                'condition' => trans('validation.more_than'),
                'count' => 240
            ]),
            'remember.boolean' => trans('validation.remember'),
        ];
    }
}
