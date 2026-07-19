<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
              return [
            'id'          => $this->id,
            'name'        => $this->name,
            'price'       => [
                'amount'   => $this->price,
                'currency' => 'EGP',
            ],
            'vendor'      => new VendorResource($this->whenLoaded('vendor')),
            'images'      => ImageResource::collection($this->whenLoaded('images')),
            'in_stock'    => $this->stock > 0,
            'created_at'  => $this->created_at->toIso8601String(),
        ];
    }
}
