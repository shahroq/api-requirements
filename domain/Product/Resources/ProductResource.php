<?php

namespace Domain\Product\Resources;

use Domain\Product\ValueObjects\Price;
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
            'price' => new Price($this->price, $this->currency, $this->discount_percentage),
        ];
    }
}
