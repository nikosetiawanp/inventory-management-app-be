<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInventoryRequest extends FormRequest
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
        $method = $this->method();
        if ($method === "PUT") {
            return [
                "number" => ["required"],
                "date" => ["required", "date_format:Y-m-d"],
                "type" => ["required", Rule::in(['A', 'D'])],
                "receiptNumber" => ["required"],
                "description" => ["nullable"],
                "transactionId" => ["required"],
            ];
        } else {
            return [
                "number" => ["sometimes"],
                "date" => ["sometimes", "date_format:Y-m-d"],
                "type" => ["sometimes", Rule::in(['A', 'D'])],
                "receiptNumber" => ["sometimes"],
                "description" => ["nullable"],
                "transactionId" => ["sometimes"],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "receipt_number" => $this->receiptNumber,
            "transaction_id" => $this->transactionId,
        ]);
    }
}
