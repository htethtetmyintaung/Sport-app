<?php

namespace App\Services;
use App\Models\Player;

class PlayerRegisterService
{
    public function store(array $data)
    {
        // Create a new record using the model
        $newRecord = Player::create($data);

        // Optionally, perform additional actions (e.g., sending notifications)

        return ['success' => true, 'message' => 'Data stored successfully', 'data' => $newRecord];
    }
}
