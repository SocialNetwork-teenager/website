<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Friends */
class FriendsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'accepted' => $this->accepted,

            'userrequest_id' => $this->userrequest_id,
            'userreceiver_id' => $this->userreceiver_id,
        ];
    }
}
