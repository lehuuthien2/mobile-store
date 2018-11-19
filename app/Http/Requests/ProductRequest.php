<?php

namespace mobileS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use mobileS\Product;

class ProductRequest extends FormRequest
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
        //Kiểm tra số phần tử của mảng picture
        if (!empty($this->request->get('product_id'))) {
            $product_id = $this->request->get('product_id');
            $product = Product::find($product_id);
            $product->picture = json_decode($product->picture);
            $count = count(array_filter($product->picture));
        }

        $rules = [
            'name' => 'required|max:100|unique:products,name',
            'price' => 'required|numeric',
            'factory_id' => 'required',
            'body' => 'required',
            'color' => 'required',
            'pic' => 'required',
            'pic.*' => 'mimes:jpg,jpeg,png,bmp',
            'plus.*' => 'mimes:jpg,jpeg,png,bmp',
            'in_stock' => 'required|numeric',
            'storage' => 'required|max:255',
            'screen' => 'required',
            'OS' => 'required',
            'camera' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'sim' => 'required',
            'pin' => 'required',
            'fingerprint' => 'required',
        ];
        if (request()->method() == 'PUT') {
            $rules['name'] = 'required|max:100|unique:products,name,' . request()->input('product_id') . ',product_id';
            if ($count >= 3) {
                $rules['pic'] = '';
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute là bắt buộc.',
            'unique' => 'Trường :attribute đã bị trùng.',
            'numeric' => 'Trường :attribute phải là kiểu số.',
            'regex' => 'Trường :attribute định dạng không đúng.',
            'currency_size' => 'Trường :attribute độ dài phải lớn hơn :min và nhỏ hơn :max.',
            'image' => 'Trường :attribute phải là kiểu ảnh',
            'mimes' => 'Trường :attribute có đuôi mở rộng thuộc :jpg,jpeg,png,bmp'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'tên sản phẩm',
            'price' => 'giá tiền',
            'body' => 'bài viết',
            'color' => 'màu sắc',
            'in_stock' => 'số lượng',
            'storage' => 'bộ nhớ',
            'screen' => 'màn hình',
            'OS' => 'hệ điêu hành',
            'fingerprint' => 'vân tay',
            'factory_id' => 'nhà sản xuất',
            'pic' => 'hình ảnh',
            'plus' => 'hình ảnh',
            'pic.*' => 'hình ảnh'
        ];
    }
}
