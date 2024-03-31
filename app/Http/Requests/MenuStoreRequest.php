<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'image'],
        ];
    }
}
