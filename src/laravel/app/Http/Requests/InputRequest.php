<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class InputRequest extends FormRequest
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
            //


            'name' => 'required',
            'hobby' => 'required',
            'food' => 'required',
            'area' => 'required',
            'login' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',

        ];


    }

    // 上書きしたいものはrequestclassに記入（attributes,messages）
    // public function attributes()
	// {
	// 	return [
	// 		// 'name' => '「お名前」',
    //         'e_mail' => '「メールアドレス」',
	// 	];
	// }

    public function messages()
	{
		return [
            'hobby.required' => ':attributeを選択してください。',
			'food.required' => ':attributeを選択してください。',
            'area.required' => ':attributeを選択してください。',

		];
	}

}