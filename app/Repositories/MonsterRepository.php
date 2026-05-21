<?php

namespace App\Repositories;

use App\Models\Monster;

class MonsterRepository
{
    public function monstersList()
    {
        return Monster::all();
    }

    public function findById($id): ?Monster
    {
        return Monster::where('id', $id)->first();
    }
}