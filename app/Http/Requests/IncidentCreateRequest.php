<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IncidentCreateRequest extends Request
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
            'evidence_number' => 'required|numeric',
            'report_date' => 'required|date',
            'observe_date' => 'required|date',
            'address' => 'required',
            'ownerships' => 'required',
            'damage_specifications' => 'required',
            'damage_types' => 'required',
            'industry_types' => 'required',

            'direct_damage_value' => 'required|numeric',
            'followup_damage_value' => 'required|numeric',
            'saved_value' => 'required|numeric',
        ];
    }
}
