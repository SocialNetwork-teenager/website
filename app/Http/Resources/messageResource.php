<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\message */
class messageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'type' => $this->type,
            'url' => $this->url,
            'content' => $this->content,

            'usersender' => $this->usersender,
            'userreceiver' => $this->userreceiver,
        ];
    }
}
