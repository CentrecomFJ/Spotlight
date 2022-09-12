<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHelpdeskTrackerRequest extends FormRequest
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
            'ref_no' => 'required',
            // 'customer_name',
            // 'address',
            // 'call_disposition',
            // 'customer_enquiry',
            // 'escalation',
            // 'call_date',
            // 'call_time',
            // 'call_direction',
            // 'sub_category',
            // 'qa_call_tracker_id',
        ];
    }
}
