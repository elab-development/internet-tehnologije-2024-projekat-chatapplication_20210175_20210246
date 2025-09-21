<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\ChatParticipant;

class ChatMessageSeeder extends Seeder
{
    public function run(): void
    {
        $chats = Chat::all();

        foreach ($chats as $chat) {
            // uzimaj id ucesnika u tom chatu
            $chatUserIds = ChatParticipant::where('chat_id', $chat->id)
                ->pluck('user_id');

            if ($chatUserIds->isEmpty()) continue;

            ChatMessage::factory()->count(5)->create([
                'chat_id' => $chat->id,
                'user_id' => $chatUserIds->random(),
            ]);
        }
    }
}
