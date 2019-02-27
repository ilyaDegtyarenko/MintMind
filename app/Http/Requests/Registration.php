<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Pearl\RequestValidate\RequestAbstract;

class Registration extends RequestAbstract
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
            'name' => 'required|min:2|max:240|regex:/^([a-zA-Zа-яА-Я]+)([0-9 ._]*)$/u',
            'email' => 'required|email|unique:users|max:240',
            'password' => 'required|confirmed|min:8|max:240|regex:/^(?=.*[a-zа-я])(?=.*[A-ZА-Я])(?=.*[#$^+=!*()@%&]).{8,240}$/u',
            'agreement' => 'accepted'
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
            'name.required' => trans('validation.required', [
                'attribute' => mb_strtolower(trans_choice('attributes.name', 'singular')),
            ]),
            'name.min' => trans_choice('validation.size', 'plural', [
                'attribute' => trans_choice('attributes.name', 'singular'),
                'condition' => trans('validation.less_than'),
                'count' => 2
            ]),
            'name.max' => trans_choice('validation.size', 'plural', [
                'attribute' => trans_choice('attributes.name', 'singular'),
                'condition' => trans('validation.more_than'),
                'count' => 240
            ]),
            'name.regex' => trans('validation.name_regex'),
            'email.required' => trans('validation.required', [
                'attribute' => mb_strtolower(trans_choice('attributes.email', 'singular-accusative')),
            ]),
            'email.max' => trans_choice('validation.size', 'plural', [
                'attribute' => trans_choice('attributes.email', 'singular'),
                'condition' => trans('validation.more_than'),
                'count' => 240
            ]),
            'email.unique' => trans_choice('validation.unique', 'singular-feminine', [
                'attribute' => mb_strtolower(trans_choice('attributes.email', 'singular'))
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
            'password.confirmed' => trans_choice('validation.confirmed', 'singular-masculine', [
                'attribute' => mb_strtolower(trans_choice('attributes.password', 'singular'))
            ]),
            'password.regex' => trans('validation.password_regex'),
            'agreement.accepted' => trans('validation.accepted', [
                'attribute' => mb_strtolower(trans('attributes.agreement'))
            ])
        ];
    }
}
