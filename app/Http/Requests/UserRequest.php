<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
          'name' => 'required',
          'email' => 'required|email',
          'employee_degree' => 'required',
          'employee_type' => 'required'
        ];

        if ($this->isMethod('post')) {
          $rules['password'] = 'required';
        }

        return $rules;
    }


    public function messages() {
      return [
        'required' => ':attribute wajib dimasukan'
      ];
    }

    public function attributes() {
      return [
        'name' => 'Nama',
        'email' => 'Alamat email',
        'password' => 'Kata sandi',
        'employee_type' => 'Jabatan',
        'employee_degree' => 'Pendidikan terakhir'
      ];
    }
}
