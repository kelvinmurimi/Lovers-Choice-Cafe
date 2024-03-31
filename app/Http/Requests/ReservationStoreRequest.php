<?php

declare(strict_types=1);

namespace App\Http\Requests;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required',  ],
            'tel_number' => ['required'],
            'table_id' => ['required'],
            'guest_number' => ['required'],
        ];
    }
}
