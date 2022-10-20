<?php

namespace Domain\Product\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'category' => $this->category,
            'price' => [
                'original' => $this->price,
                'final' => $this->discount_percentage ? $this->price - $this->discount_percentage * $this->price / 100 : $this->price,
                'discount_percentage' => $this->discount_percentage ? $this->discount_percentage . "%" : null,
                'currency' => $this->currency,
            ],
        ];
    }
}
