<?php

namespace App\Http\Controllers\Postrequests;

class PIPSConsentFormRequest extends \Illuminate\Http\Request
{
    public function rules(): array {
        return [
            'pis' => 'required',
            'voluntary' => 'required',
            'data' => 'required',
            'agree' => 'required',
            'name' => 'required',
            'consentdate' => 'required',
            'ppt_signature' => 'required',
        ];
    }
}
