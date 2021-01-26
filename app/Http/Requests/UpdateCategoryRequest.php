<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'en_category_name' => [
                'required',
            ],
            'es_category_name' => [
                'required',
            ],
        ];
    }
}
