<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreDebtPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "receiptNumber" => ["required"],
            "paidDate" => ["required", "date_format:Y-m-d"],
            "paidAmount" => ["required"],
            "balance" => ["required"],
            "debtId" => ["required"]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "receipt_number" => $this->receiptNumber,
            "paid_date" => $this->paidDate,
            "paid_amount" => $this->paidAmount,
            "debt_id" => $this->debtId,
        ]);
    }
}
