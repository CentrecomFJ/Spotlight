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
            'call_stats_date' => 'required',
            'time' => 'required',
            'length_of_call' => 'required',
            'parties' => 'required',
            'direction' => 'required',
            'skills' => 'required',
            'category' => 'required',
            'details' => 'required',
            'call_type' => 'required',
            'support_level' => 'required',
            'confirm' => 'required',
        ];
    }
}
