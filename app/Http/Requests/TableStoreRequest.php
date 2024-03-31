<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableStoreRequest extends FormRequest
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
            'guest_number' => ['required'],
            'status' => ['required'],
            'location' => ['required'],
        ];
    }
}
