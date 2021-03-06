<?php

namespace App\Http\Requests\Frontend\User;

use App\Http\Requests\Request;

/**
 * Class UpdateProfileRequest.
 */
class UpdateProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'  => 'required|max:30|alpha_dash|unique:users,username,'.auth()->user()->id,
            'first_name'  => 'required|max:191',
            'last_name'  => 'required|max:191',
            'email' => 'sometimes|required|email|max:191',
        ];
    }
}
