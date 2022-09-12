<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMOHCovidTrackerRequest extends FormRequest
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
        return [
            
            'ref_no' => 'required|unique:moh_covid_tracker,ref_no',
            'call_date' => 'required',
            'call_time' => 'required',
            'call_direction' => 'required',
            'call_type' => 'required',
            'phone',
            'fullname' => 'required',
            'gender' => 'required',
            'travelled' => 'required',
            'known_contact'=> 'required',
            'symptoms',
            'location'=> 'required',
            'physical_address'=> 'required',
            'email_address',
            'query_details'=> 'required',
            'division'=> 'required',
            'query_type'=> 'required',
            
        ];
    }
}
