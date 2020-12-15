<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class EventSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name' => 'Brunch & Bobler',
            'date' => Carbon::createFromDate(2021, 1, 30),
            'time' => Carbon::createFromTime(13),
            'duration' => 180,
            'content' => '
            <h3 class="font-sche text-2xl md:text-3xl font-bold">Dagens Program</h3>
            <p>Det Gamle Posthus byder velkommen til en formiddag i afslapningens tegn.</p>
            <p>Vi forkæler dig med en lækker brunch baseret på lokale råvarer tilberedt med omhu.</p>
            <p>Maden bliver serveret over flere omgange ved bordet, så du skal blot læne dig tilbage og slappe af.</p>
            <p>Til maden serveres søde & halvtørre bobler, iskold juice, kaffe fra Nørre Snede kafferisteri & små overraskelser.</p>',
            'content2' => '
            <h3 class="font-sche text-2xl md:text-3xl font-bold">Menu</h3>
            <p><b>Havregrød af gryn fra Uldum Mølle</b><br>
            med pærekompot & kanel.</p>
            <b>Fiskeanretning</b><br>
            med Croissant med koldrøget laks & stegt kammusling på citrusmarineret grønkål.</p>
            <b>Æg en cocotte</b><br>
            med svampe & skinke.</p>
            <b>Vitello tonnato</b><br>
            Den italienske klassiker med kalv & tunsauce.</p>
            <b>Kålsalat</b><br>
            af rødkål & rosenkål med granatæble & nødder.</p>
            <b>Friteret brie</b><br>
            med solbærsylt.</p>
            <b>Æble tarte tartin</b><br>
            med cremefraiche.</p>
            ',
            'button_text' => 'Book Bord',
            'button_link' => 'https://book.easytablebooking.com/book/?id=1d580&lang=da&date=30-01-2021&type=2655',
            'price' => 395,
            'online' => true,
        ]);

        Event::factory()->times(5)->create();

    }
}
