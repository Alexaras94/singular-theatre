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
            'username' => 'required|string|min:8|max:30|regex:/[a-zA-ZΑ-Ωα-ωίϊΐόάέύϋΰήώ]*+[ ]+[a-zA-ZΑ-Ωα-ωίϊΐόάέύϋΰήώ]*/',
            'number_of_seats' => 'required|numeric|min:1|max:4',
            'email' => 'required',
            'phone_number' => 'required|regex:/69+[0-9]{8}/',
            'company' => 'required|max:30',
            'venue_id' => 'required|exists:venues,id',
            'terms' => 'required'

            
        ];
    }


    public function messages():array
    {
        return ['username.regex'=>'Το Όνοματεπώνυμο πρέπει να ειναι της μορφής "Όνoμα Επίθετο" ',
            'phone_number.regex'=>'Ο αριθμός του κινητού δεν είναι σωστός'];
    }
}
