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
                'icon' => '⏰',
                'title' => 'Kahoot!',
                'description' => 'De school klasieker, kahoot! We gaan met z\'n allen kahoot spelen.'
            ],
            [
                'icon' => '🎥',
                'title' => 'Raad de film',
                'description' => 'Er worden een aantal trailers van bekende films afgespeeld en het groepje dat als eerste de film raad krijgt een punt.'
            ],
            [
                'icon' => '🌄',
                'title' => 'Emoji Puzzel',
                'description' => 'Ieder groepje krijgt een puzzel van een emoji en de punten worden op basis van stelheid uitgedeeld.'
            ],
            [
                'icon' => '🤑',
                'title' => 'Speurtocht',
                'description' => 'Volg de onderstaande route(begin bij blokhut uitgang) en vindt de schat. <br /><br /> 👆 25m<br />👈 100m <br />👉 30m <br />👈 75m <br />👉 50m<br />👆 100m<br />👈 25m<br /><br />💰 profit'
            ],
            [
                'icon' => '🤖',
                'title' => 'Emoji Zin',
                'description' => 'Hieronder staan verschillende zinnen, vertaal deze in emoji\'s en laat een teamgenoot deze weer terug vertalen naar tekst. <br /><br />1. Ik pas laat thuis, zou je voor mij boodschappen kunnen doen en de kinderen naar voetbal kunnen brengen?<br />2. Ik heb vandaag nog lang school lijkt het je niet wat om vanavond naar de film te gaan en daarna wat te eten? '
            ],
            [
                'icon' => '💥',
                'title' => 'Hoe loopt het af?',
                'description' => 'Er worden een aantal filmpjes getoond en het team dat het einde goed raad krijgt een punt.'
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
