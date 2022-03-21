<?php

namespace App\Modules\Products\Resources;

use App\Modules\API\Services\ParsingService;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    private ParsingService $parsingService;

    public function __construct($resource)
    {
        $this->parsingService = new ParsingService();
        parent::__construct($resource);
    }

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
            'price' => $this->price ,
            'description' => $this->description,
            'image' => getLink($this->image),
            'category' => $this->whenLoaded('category'),
            'created_at' => $this->created_at,
        ];
    }
}
