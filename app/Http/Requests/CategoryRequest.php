<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        //
        $rules = [];
        //lấy ra tên phương thức cần xử lý
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction):
                    case 'add':
                        //xây dựng rules validate trong này
                        $rules = [
                            'c_name' => 'required',
                        ];
                        break;

                    case 'edit':
                        //xây dựng rules validate trong này
                        $rules = [
                            'c_name' => 'required',
                        ];
                        break;

                endswitch;
                break;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'c_name.required' => 'tên không được để trống',
        ];
    }
}
