<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBankTransaction extends FormRequest
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
            'uuid' => 'required|uuid|unique:bank_transaction',
            'amount' => 'required|numeric|between:0,99.99',
            'booking_date' => 'required|date_format:Y-m-d H:i:s',
            'parts' => 'required|array',
            'parts.*.amount' => 'required|numeric|between:0,99.99',
            'parts.*.reason' => 'required|string|in:debtor_payback,bank_charge,payment_request,unidentified',
        ];
    }

    public function messages()
    {
        return [
            'uuid.required' => 'UUID is missing',
            'uuid.unique' => 'UUID already exists',
            'uuid.uuid' => 'Bad UUID format',
            'amount.numeric' => 'Amount should be numeric and decimal format',
            'booking_date.required' => 'Booking date is missing',
            'booking_date.datetime' => 'Booking date must be a date time format',
            'parts' => 'Bank transaction parts is missing',
            'parts.array' => 'Bank transaction parts must be type array',
            'parts.*.amount.required' => 'Transaction part amount is missing',
            'parts.*.amount.numeric' => 'Transaction part amount must be numeric and decimal',
            'parts.*.reason.required' => 'Transaction part reason is missing',
            'parts.*.reason.in' => 'Invalid transaction part reason'
        ];
    }
}
