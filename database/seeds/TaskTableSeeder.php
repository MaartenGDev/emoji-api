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
        $tasksForAllGroups = collect([1, 2, 3])->flatMap(function ($groupId) {
            return $this->getTasksForGroup($groupId);
        })->toArray();

        DB::table('tasks')->insert($tasksForAllGroups);
    }

    private function getTasksForGroup($groupId)
    {
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
                'description' => 'Volg de onderstaande route(begin bij blokhut uitgang) en vindt de schat. <br /><br /><p>Team A</p><br />👆 25m<br />👈 100m <br />👉 30m <br />👈 75m <br />👉 50m<br />👆 100m<br />👈 25m <br /><p>Team B</p><br />👆 100m<br />👈 25m <br />👆 80m <br />👉 30m <br />👉 50m<br />👆 100m<br />👈 25m <br /><p>Team C</p><br />👆 25m<br />👉 50m<br />👆 100m <br />👈 30m <br />👆 75m <br />👈 100m<br />👆 50m'
            ],
            [
                'icon' => '🤖',
                'title' => 'Emoji Zin',
                'description' => 'Hieronder staan verschillende zinnen, vertaal deze in emoji\'s en laat een teamgenoot deze weer terug vertalen naar tekst. <br /><br />1. Ik ben pas laat thuis, zou je voor mij de boodschappen kunnen doen en de kinderen naar voetbal kunnen brengen?<br />2. Ik heb vanavond nog niks gepland, lijkt je het niet wat om vanavond naar de film te gaan en daarna wat te eten? <br /> 3. <br /> Draai een keer in het rond<br />Stamp met je voeten op de grond<br />Zwaai je armen in de lucht<br />Ga nu zitten met een zucht<br />Stap nu rond als een gans <br />Zo gaat de kabouter dans <br /> <br />4. <br /> welkom welkom<br />bij de 3 biggetjes<br />welkom welkom<br />wat hebben we plezier<br />welkom welkom<br />bij de 3 biggetjes<br />kom maar snel naar hier '
            ],
            [
                'icon' => '💥',
                'title' => 'Hoe loopt het af?',
                'description' => 'Er worden een aantal filmpjes getoond en het team dat het einde goed raad krijgt een punt.'
            ],
            [
                'icon' => '⚽',
                'title' => 'Voetbal/Trefbal',
                'description' => 'We gaan voetballen/trefballen.'
            ],
            [
                'icon' => '🍩',
                'title' => 'Pauze!',
                'description' => 'Tijd voor 🍹 en 🍪'
            ],
        ])->map(function ($task) use ($groupId) {
            return array_merge($task, ['group_id' => $groupId]);
        });
    }
}
