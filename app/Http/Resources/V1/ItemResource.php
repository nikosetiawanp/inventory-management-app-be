<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "quantity" => $this->quantity,
            "price" => $this->price,
            "discount" => $this->discount,
            "tax" => $this->tax,
            "purchaseId" => $this->purchase_id,
            "productId" => $this->product_id,
        ];
    }
}
