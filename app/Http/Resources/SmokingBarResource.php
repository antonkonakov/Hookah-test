<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SmokingBarResource extends JsonResource
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
            'type' => 'smoking_bar',
            'id' => (string)$this->id,
            'attributes' => [
                'name' => $this->name,
                'hookahs' => new HookahsResource($this->hookah)
            ],
            'links' => [
                'self' => route('smoking-bar.show', $this->id),
            ],
        ];
    }


}
