<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEscalationTrackerRequest extends FormRequest
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
        // 'date_received'=>"required",
        // 'time_received'=>"required",
        // 'email_address'=>"required",
        // 'email_subject'=>"required",
        // 'order_no'=>"required",
        ];
    }
}
