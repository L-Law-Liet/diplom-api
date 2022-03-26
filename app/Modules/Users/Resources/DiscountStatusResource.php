<?php

namespace App\Modules\Users\Resources;

use App\Models\DiscountCard;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountStatusResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'color' => $this->color,
            'discount' => $this->discount,
            'min' => $this->min,
        ];
    }
}
