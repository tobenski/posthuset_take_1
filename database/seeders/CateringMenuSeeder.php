<?php

namespace Database\Seeders;

use App\Models\CateringMenu;
use App\Models\CateringType;
use Illuminate\Database\Seeder;

class CateringMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CateringMenu::create([
            'title' => 'Bakkelandets Buffet',
            'description' => '
            En buffet med et mindre udvalg af lækre retter.<br>
            Forretterne er klassikere som de fleste synes om. <br>
            Hovedretterne er lavet som komplette retter, det vil sige at der til hvert stykke kød er kartoffel, sauce, grønsag og salat der passer til.<br>
            Til dessert er der endnu et par klassikere.<br>
            Sammen med buffeten er der surdejsboller lavet på mel fra Uldum Mølle.
            ',
            'menu' => '<p><b>Cæsar Salat</b><br>Cæsar salat med romaine salat, cæsar dressing, parmesan, bacon & sprødt brød.</p><p><b>Tørret Skinke</b><br>Tørret Skinke med løgsylt, pesto & sprøde rugchips.</p><p><b>"Rejecocktail"</b><br>Rejecocktail anrettet på fad med rejer, asparges, dressing, tomat, salat & .</p><br><p><b>Svinemørbrad Saltimbocca</b><br>Svinemørbrad i tørret skinke med krydderurter. Serveret med lys pebersauce, urtestegte kartofler, sauté af svampe, hvidløg & tomat, samt en cremet blomkålssalat med æbler, mandler, radise & persille.</p><p><b>Stegt Kyllingebryst</b><br>Kyllingebryst med pommes rösti, purløgs suprême sauce, bagte gulerødder, samt en hvedekernesalat med pesto, syltede rødløg, ristede græskarkerner & fennikel crudité.</p><br><p><b>Gammeldaws Æblekage</b><br>Æblekage med makroner og flødeskum.</p><p><b>Brownie</b><br>Chokoladebrownie pyntet med hvid chokolademousse & brombær.</p><br><p><b>Brød & Smør</b><br>Hjemmebagte surdejsboller & smør.</p>',
            'price' => 199,
            'min_couv' => 5,
            'days_before' => 5,
            'catering_type_id' => CateringType::where('name', 'Buffet')->first()->id,
        ]);
        CateringMenu::create([
            'title' => 'Brædstrup Buffeten',
            'description' => '
            En luksusbuffet, hvor der virkelig er valgt udsøgte råvarer.<br>
            Forretter: Dyrekølle, Hummersuppe, Tun & Varmerøget Laks.
            Hovedretter: Perlehøne, Hellefisk & oksemørbrad.<br>
            Desserter: Rabarber Trifli, Gateau Marcel, Ostebræt.
            ',
            'menu' => '
<p><b>Røget Dyrekølle</b><br>
Røget dyrekølle med Blå Kornblomst creme, valnødder, grillede syltede løg & frissé salat.</p>
<p><b>Hummersuppe</b><br>
Cremet hummersuppe med fiskesoufflé, sprødt brød & purløg.</p>
<p><b>Grillet Marineret Tun</b><br>
Grillet Marineret Tun serveret med langtidsbagt tomat, dildmayo & hvede chips.</p>
<p><b>Varmrøget Laks</b><br>
Varmrøget Laks med syltede rødløg, krydderurtecreme & små salater.</p>
<br>
<p><b>Urtefarseret Perlehøne</b><br>
Urtefarseret Perlehøne med pommes fondant, sauce suprême, hvedekernesalat med pesto, syltede rødløg, ristede græskarkerner & fennikel crudité.</p>
<p><b>Krydderurtebagt Hellefisk</b><br>
Urtebagt Hellefisk med krydderurtekartofler, fiskesauce, blomkålsflan & spidskålssalat med fennikel, granatæble & chorizo.</p>
<p><b>Oksemørbrad</b><br>
Rosastegt Oksemørbrad på pommes rösti, med sprød panchetta, ragout af svampe, paprika, perleløg & purløg, samt en tomat salat med mozzarella, rødløg & pesto.</p>
<br>
<p><b>Rabarber Trifli</b><br>
Rabarber Trifli med vaniljecreme, markon & rabarbersylt.</p>
<p><b>Gateau Marcel</b><br>
Gateau Marcel med krystalliseret hvid chokolade & solbærsylt.</p>
<p><b>Unika ostebræt</b><br>
Ostebræt med Den Hvide Dame, Rød Løber, Ask, Havgus & Høgelundgaard, alle fra Arla Unika. Hertil sødt, sylt & knækbrød.</p>
<br>
<p><b>Brød & Smør</b><br>
Hjemmebagte surdejsboller & smør.</p>
            ',
            'min_couv' => 8,
            'days_before' => 10,
            'price' => 449,
            'catering_type_id' => CateringType::where('name', 'Buffet')->first()->id,
        ]);

        CateringMenu::factory()->times(30)->create();
        $menus = CateringMenu::all();
        foreach ($menus as $menu) {
            $menu->addMediaFromUrl('https://picsum.photos/2000/3000?random=' . ($menu->id+1))
            ->toMediaCollection('catering');
        }
    }
}
