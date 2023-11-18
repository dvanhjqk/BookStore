<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                            'pro_name' => 'required',
                            'pro_price' => 'required',
                            'pro_price_sale' => 'required',
                            'image' => 'required',
                            'pro_stock' => 'required',
                            'pro_description' => 'required',
                            'pro_category_id' => 'required',
                            'pro_publisher_id' => 'required',
                            'pro_supplier_id' => 'required',
                            'pro_author_id' => 'required'
                        ];
                        break;

                    case 'edit':
                        //xây dựng rules validate trong này
                        $rules = [
                            'pro_name' => 'required',
                            'pro_price' => 'required',
                    
                            'pro_stock' => 'required',
                            'pro_category_id' => 'required',
                            'pro_publisher_id' => 'required',
                            'pro_supplier_id' => 'required',
                            'pro_author_id' => 'required'
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
            'pro_name.required' => 'Tên không được để trống',
            'pro_price.required' => 'Giá không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'pro_stock.required' => 'Số lượng không được để trống',
            'pro_category_id.required' => 'Danh mục không được để trống',
            'pro_publisher_id.required' => 'Nhà sản xuất không được để trống',
            'pro_supplier_id.required' => 'Nhà cung cấp không được để trống',
            'pro_author_id.required' => 'Tác giả không được để trống',
        ];
    }
}
