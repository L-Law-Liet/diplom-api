<?php

namespace App\Modules\Info\Resources;

use App\Modules\Products\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class InfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $value = ($this->type == 'image') ? getLink($this->value) : $this->value;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'key' => $this->key,
            'value' => $value,
        ];
    }
}
