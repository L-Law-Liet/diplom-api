<?php

namespace App\Modules\Users\Resources;

use App\Models\DiscountCard;
use App\Models\DiscountStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $card = null;
        if ($this->discount_status) {
            $card = (new DiscountStatusResource($this->discount_status))->toArray($request);
            $card['expires'] = $this->discount_card->expires;
            $card['next'] = new DiscountStatusResource(DiscountStatus::
            where('min', '>', $card['min'])
                ->orderBy('min')->first());
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'image' => getLink($this->image),
            'card' => $card,
        ];
    }
}
