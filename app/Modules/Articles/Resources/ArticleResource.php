<?php

namespace App\Modules\Articles\Resources;

use App\Modules\Products\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['image'] = getLink($this->image);
        $data['article_type'] = $this->whenLoaded('article_type');
        return $data;
    }
}
