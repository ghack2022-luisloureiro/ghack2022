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
            'produto_id' => $this->produto_id,
            'grupo' => $this->produtoNome
        ];
    }
}
