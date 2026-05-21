<?php

namespace App\Services;

use App\Repositories\MonsterRepository;
use App\Models\Monster;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MonsterService
{
    public function __construct(
        protected MonsterRepository $monsterRepository
    ){}

    public function getAllMonsters(){
        $monsters = $this->monsterRepository->monstersList();

        if(!$monsters){
            throw new ModelNotFoundException("Nenhum MVP encontrado.");
        }

        return $monsters;
    }

    public function getMonsterById(int $id){
        $monster = $this->monsterRepository->findById($id);

        if(!$monster){
            throw new ModelNotFoundException("MVP com ID {$id} não encontrado.");
        }

        return $monster;
    }
}