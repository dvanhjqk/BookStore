<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];

        //lấy ra tên phương thức cần xử lý
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction):
                    case 'add':
                        //xây dựng rules validate trong này
                        $rules = [
                            'sup_name' => 'required',
                            'sup_email' => ['required', 'email:rfc,dns', 'unique:supplier,sup_email'],
                            'sup_address' => 'required',
                            'sup_phone' => ['required', 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/', 'min:10', 'unique:supplier,sup_phone'],
                        ];
                        break;
                    case 'edit':
                        //xây dựng rules validate trong này
                        $rules = [
                            'sup_name' => 'required',
                            'sup_email' => [
                                'required',
                                'email:rfc,dns',
                                Rule::unique('supplier', 'sup_email')->ignore($this->route('id'))
                            ],
                            'sup_address' => 'required',
                            'sup_phone' => ['required', 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/', 'min:10', Rule::unique('supplier', 'sup_phone')->ignore($this->route('id'))],
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
            'sup_name.required' => 'Tên không được để trống',
            'sup_email.required' => 'Email không được để trống',
            'sup_email.email' => 'Chưa đúng định dạng email',
            'sup_email.unique' => 'Email đã tồn tại',
            'sup_address.required' => 'Địa chỉ không được để trống',
            'sup_phone.required' => 'Số điện thoại không được để trống',
            'sup_phone.regex' => 'Số điện thoại không đúng định dạng',
            'sup_phone.min' => 'Số điện thoại không đúng định dạng',
            'sup_phone.unique' => 'Số điện thoại đã tồn tại'
        ];
    }
}
