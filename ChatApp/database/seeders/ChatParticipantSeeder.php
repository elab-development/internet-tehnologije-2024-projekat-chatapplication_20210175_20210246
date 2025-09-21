<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chat;
use App\Models\User;
use App\Models\ChatParticipant;

class ChatParticipantSeeder extends Seeder
{

    public function run(): void
    {
        $chats = Chat::all();
        $users = User::all();

        foreach ($chats as $chat) {
            // Odaberi nasumičan broj korisnika za chat (npr. između 2 i 5)
            $participants = $users->random(2);

            foreach ($participants as $user) {
                // Proveri da li već postoji veza da ne bi duplirali
                ChatParticipant::firstOrCreate([
                    'chat_id' => $chat->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
