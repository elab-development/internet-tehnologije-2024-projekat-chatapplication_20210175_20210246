<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatParticipantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'chat' => new ChatResource($this->whenLoaded('chat')),
            'user' => new UserResource($this->whenLoaded('user')),
            'joined_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
