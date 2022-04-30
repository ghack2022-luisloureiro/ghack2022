<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Item extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'slug_url' => \Illuminate\Support\Str::slug($this->nome, '-'),

            'soil' => $this->soil,
            'water' => $this->water,
            'climate' => $this->climate,
            'productivity' => $this->productivity,
            'human_capital' => $this->human_capital,
            'social_capital' => $this->social_capital,
            'biodiversity' => $this->biodiversity,
            'crop_health' => $this->crop_health,
            'livestock_management' => $this->livestock_management,
            'nutrient_management' => $this->nutrient_management,
            'energy_usage' => $this->energy_usage,
            'barcode' => $this->barcode,

            'produto_id' => $this->produto_id,
            'grupo' => $this->produtoNome
        ];
    }
}
