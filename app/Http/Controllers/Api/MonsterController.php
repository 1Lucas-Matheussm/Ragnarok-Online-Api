<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MonsterResource;
use App\Services\MonsterService;

class MonsterController extends Controller
{
    public function __construct(
        protected MonsterService $monsterService
    ) {}

    public function index()
    {
        $monsters = $this->monsterService->getAllMonsters();
        return response()->json($monsters);
    }

    public function show($id): MonsterResource
    {
        $monster = $this->monsterService->getMonsterById($id);
        return new MonsterResource($monster);
    }
}
