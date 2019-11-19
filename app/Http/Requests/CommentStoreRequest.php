<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
            'post_comment' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'post_comment.required' => 'Vous ne pouvez pas poster un commentaire vide',
        ];
    }
}
