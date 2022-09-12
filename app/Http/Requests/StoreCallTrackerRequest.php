<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCallTrackerRequest extends FormRequest
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
            'refno' => 'required',
            'skill' => 'required',
            'category' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            // 'streetnum' => 'required',
            'streetname' => 'required',
            // 'suburb' => 'required',
            // 'town_city' => 'required',
            'mobile' => 'required',
            // 'alt_contact' => 'required',
            // 'postal' => 'required',
            // 'email' => 'required',
            // 'dl_num' => 'required',
            // 'clr_num' => 'required',
            'sub_category' => 'required',
            // 'enquiry_comments' => 'required',
            // 'escalation_department' => 'required',
            // 'escalation_person_name' => 'required',
            // 'escalation_outcome' => 'required',
            // 'escalation_call_disposition' => 'required',
            // 'escalation_comments' => 'required',
            // 'complaint_type' => 'required',
            // 'complaint_ticket' => 'required',
            // 'complaint_comments' => 'required',
            // 'confirm' => 'required',
        ];
    }
}
