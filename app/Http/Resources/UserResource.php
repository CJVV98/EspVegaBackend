<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "id" => isset($this->id) ? $this->id : null,
            "name" => isset($this->name) ? $this->name : null,
            "email" => isset($this->email) ? $this->email : null,
            "lastname" => isset($this->lastname) ? $this->lastname : null,
            "address" => isset($this->address) ? $this->address : null,
            "phone" => isset($this->phone) ? $this->phone : null,
            "active" => isset($this->active) ? $this->active : null,
            "code" => isset($this->code) ? $this->code : null
        ];
    }
}

