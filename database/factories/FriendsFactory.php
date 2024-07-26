<?php

namespace Database\Factories;

use App\Models\Friends;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FriendsFactory extends Factory
{
    protected $model = Friends::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'accepted' => $this->faker->boolean(),

            'userrequest_id' => User::factory(),
            'userreceiver_id' => User::factory(),
        ];
    }
}
