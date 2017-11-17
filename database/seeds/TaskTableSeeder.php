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
                'icon' => '😱',
                'title' => 'Opdracht 1',
                'description' => 'Hier komt de omschrijving'
            ],
            [
                'icon' => '🤠',
                'title' => 'Opdracht 2',
                'description' => 'Hier komt de omschrijving'
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
