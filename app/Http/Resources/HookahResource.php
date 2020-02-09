<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HookahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'hookah',
            'id' => (string)$this->id,
            'attributes' => [
                'smoking_bar_id' => $this->smoking_bar_id,
                'name' => $this->name,
            ],
            'links' => [
                'self' => route('smoking-bar.hookah.show', [$this->smoking_bar_id, $this->id]),
            ],
        ];
    }
}
