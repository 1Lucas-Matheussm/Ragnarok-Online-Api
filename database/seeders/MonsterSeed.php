<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Monster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MonsterSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('data/mvps_bro.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("Arquivo JSON não encontrado em: {$jsonPath}");
            return;
        }

        $monstersData = json_decode(File::get($jsonPath), true);

        $this->command->info("Importando " . count($monstersData) . " registros de Monsters...");

        foreach ($monstersData as $monster) {

            $cleanMapName = $this->sanitizeFileName($monster['map']);
            $urlPath = "data/sprites";

            $monsterPath = "$urlPath/monsters/{$monster['id']}.png";
            $mapPath     = "$urlPath/maps/{$cleanMapName}.png";

            $monsterImgValidate = File::exists(public_path($monsterPath));
            $mapImgValidate     = File::exists(public_path($mapPath));

            Monster::updateOrCreate(
                [
                    'monster_id' => $monster['id'],
                    'name' => $monster['name'],

                    'map' => $monster['map'],
                    'respawn_time' => $monster['respawn_time'],
                    'respawn_max_time' => $monster['respawn_max_time'],

                    'sprite' => $monsterImgValidate ? $monsterPath : "failImage.png",
                    'map_image_url' => $mapImgValidate ? $mapPath : "failImage.png",
                ]
            );
        }

        $this->command->info("Seed de Monsters finalizada com sucesso!");
    }

    private function sanitizeFileName(string $filename): string
    {
        $filename = str_replace('@', '', $filename);
        return Str::slug($filename, '_');
    }
}
