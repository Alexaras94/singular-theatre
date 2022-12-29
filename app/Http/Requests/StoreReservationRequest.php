<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
        return [
            'username' => 'required',
            'number_of_seats' => 'required|numeric|max:1',
            'email' => 'required',
            'phone_number' => 'required',
            'company' => 'required|max:20',
            'venue_id' => 'required|exists:venues,id',

        ];
    }
}
