<?php

namespace App\Http\Controllers;
use App\Models\Player;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        return Inertia::render('About', [
            'players' => Player::paginate()
        ]);
    }
}
