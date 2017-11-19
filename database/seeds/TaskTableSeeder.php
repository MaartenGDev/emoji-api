<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //

    public function run()
    {
        $tasksForAllGroups = collect([1,2,3])->flatMap(function($groupId){
            return $this->getTasksForGroup($groupId);
        })->toArray();

        DB::table('tasks')->insert($tasksForAllGroups);
    }

    private function getTasksForGroup($groupId){
        return collect([
            [
                'icon' => '😂',
                'title' => 'Wie ben ik',
                'description' => 'Elke speler krijgt een papiertje op de rug geplakt met daarop een emoji dat een object representeert. Het gehele team moet zo snel mogelijk uitzoeken welk object hij/zij is. <br /><br /> Het is natuurlijk niet te bedoeling om te vragen: "Wie ben ik ?", maar wel: "Ben ik een man of een vrouw, een Kip, een flat, een kunstenaar, een hipster?"'
            ],
            [
                'icon' => '🎤',
                'title' => 'Guess the song',
                'description' => 'Er worden een aantal liedjes afgespeeld en welk groepje de titel  van het liedje het eerste raad wint.'
            ],
            [
                'icon' => '🙄',
                'title' => 'Opdracht 3',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '👽',
                'title' => 'Opdracht 4',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '😡',
                'title' => 'Opdracht 5',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '🎃',
                'title' => 'Opdracht 6',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '💩',
                'title' => 'Opdracht 7',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '🤖',
                'title' => 'Opdracht 8',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '🐼',
                'title' => 'Opdracht 9',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '🌚',
                'title' => 'Opdracht 10',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '🌍',
                'title' => 'Opdracht 11',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '🌈',
                'title' => 'Opdracht 12',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '☃️',
                'title' => 'Opdracht 13',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '🥐',
                'title' => 'Opdracht 14',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '🍩',
                'title' => 'Opdracht 15',
                'description' => 'Hier komt de omschrijving'
            ],
        ])->map(function($task) use ($groupId) {
            return array_merge($task, ['group_id' => $groupId]);
        });
    }
}
