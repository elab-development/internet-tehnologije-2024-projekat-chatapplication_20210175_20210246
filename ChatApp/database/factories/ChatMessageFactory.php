<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ChatMessage;
use App\Models\User;
use App\Models\Chat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatMessage>
 */
class ChatMessageFactory extends Factory
{
    protected $model = ChatMessage::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'chat_id' => Chat::inRandomOrder()->first()->id,
            'message' => $this->faker->sentence(),
        ];
    }
}
