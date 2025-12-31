<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        dump('NewsSeeder running');


        $user = User::where('email', 'admin@ehb.be')->first();
        if (!$user) {
            return;
        }

        $items = [


            [
                'title' => 'GlamConnect Lanceert: Waar Glamour & Code Naadloos Samensmelten!',
                'content' => '
                <p><strong>De toekomst is hier, en ze is glamoureus én intelligent!</strong></p>

                <p>GlamConnect opende officieel haar deuren met een spectaculair launch event waar beauty, technologie en ambitie samenkwamen.</p>

                <h2>Wat maakte deze avond uniek?</h2>

                <ul>
                    <li>Live make-up demo’s door getalenteerde student-stylisten</li>
                    <li>Inspirerende haarstyling tips voor professionele settings</li>
                    <li>Lightning talks over webontwikkeling, cybersecurity en AI</li>
                </ul>

                <h2>Voor wie was dit event?</h2>

                <p>Deze avond was dé place to be voor studenten die hun creatieve talent willen combineren met een toekomst in IT.</p>

                <p><em>Mis geen toekomstige events en schrijf je in via onze contactpagina.</em></p>
                ',

                'image' => 'news/sample.png',

            ],


            [
                'title' => 'Power-Up Je Interview: Sollicitatie-Glam voor de IT-Pro!',
                'content' => '
                <p><strong>Jouw eerste indruk telt — ook in IT.</strong></p>

                <p>In een competitieve sector is het belangrijk om professioneel over te komen zonder jezelf te verliezen.</p>

                <h2>Wat leer je in deze workshop?</h2>

                <ul>
                    <li>Subtiele make-up die vertrouwen uitstraalt</li>
                    <li>Kapsels die professioneel én comfortabel zijn</li>
                    <li>Kledingkeuzes die passen bij de IT-sector</li>
                </ul>

                <h2>Voor wie?</h2>

                <p>Ideaal voor laatstejaarsstudenten en starters die hun eerste stappen zetten op de arbeidsmarkt.</p>
                ',

                'image' => 'news/sample2.png',

            ],


            [
                'title' => 'Catwalk Meets Code: Jouw Netwerk-Défilé naar Succes!',
                'content' => '
                <p><strong>Netwerken hoeft niet saai of ongemakkelijk te zijn.</strong></p>

                <p>Hair & Code combineert speed-networking met beauty touch-ups voor een unieke ervaring.</p>

                <h2>Hoe verloopt de avond?</h2>

                <ol>
                    <li>Snelle haar touch-up door student-stylisten</li>
                    <li>Speed-networking met IT-bedrijven</li>
                    <li>Informele gesprekken in een ontspannen sfeer</li>
                </ol>

                <p>Neem je cv mee en wie weet vertrek je met een stageplaats én een frisse look.</p>
                ',
                'image' => 'news/sample1.png',

            ],


            [
                'title' => 'The Winter Glow Protocol: Skincare voor de IT-Professional',
                'content' => '
                <p><strong>Lange dagen achter een scherm vragen extra zorg voor je huid.</strong></p>

                <p>Droge lucht, verwarming en blauw licht kunnen je huidbarrière aantasten.</p>

                <h2>Waarom winter extra zwaar is voor je huid</h2>

                <ul>
                    <li>Blauw licht versnelt huidveroudering</li>
                    <li>Droge lucht onttrekt vocht</li>
                    <li>Stress beïnvloedt je huidconditie</li>
                </ul>

                <h2>Onze Herfst/Winter 2025 routine</h2>

                <p>Focus op hydraterende serums, barrier repair crèmes en SPF — ook in de winter.</p>
                ',
                'image' => 'news/sample3.jpg',

            ],

            [
                'title' => 'Lente/Zomer 2026: De Terugkeer van de Pastel Power-Suit',
                'content' => '
                <p><strong>Power dressing krijgt een zachte make-over.</strong></p>

                <p>De catwalks in Parijs bevestigen het: pastel is terug, ook in business fashion.</p>

                <h2>Waarom pastel werkt in professionele settings</h2>

                <ul>
                    <li>Strak maar toegankelijk</li>
                    <li>Vrouwelijk zonder kracht te verliezen</li>
                    <li>Perfect te combineren met tech-accessoires</li>
                </ul>

                <p>Denk aan babyblauw, poederroze en minimalistische snits.</p>
                ',
                'image' => 'news/sample4.png',

            ],


            [
                'title' => 'Tech-Gadgets die in je Handtas Passen: Luxe Ontmoet Functionaliteit',
                'content' => '
                <p><strong>Functionaliteit mag er ook mooi uitzien.</strong></p>

                <p>Voor de moderne GlamConnect-vrouw selecteerden we gadgets die stijl en techniek combineren.</p>

                <h2>Onze favorieten</h2>

                <ul>
                    <li>Opvouwbare mechanische toetsenborden in roségoud</li>
                    <li>Compacte high-end powerbanks</li>
                    <li>Minimalistische laptop sleeves</li>
                </ul>

                <p>Werk overal efficiënt én in stijl, zonder compromissen.</p>
                ',
                'image' => 'news/sample5.jpg',

            ],
            [
                'title' => 'Clean Girl Make-Up: waarom minimalisme blijft scoren',
                'content' => '
        <p><strong>Minder make-up, meer uitstraling.</strong></p>

        <p>De clean girl look blijft razend populair dankzij haar frisse, natuurlijke uitstraling.</p>

        <h2>Wat maakt deze look zo sterk?</h2>

        <ul>
            <li>Glowy skin met minimale producten</li>
            <li>Subtiele blush en lipgloss</li>
            <li>Natuurlijke brows en zachte highlights</li>
        </ul>

        <p>Perfect voor everyday looks én professionele settings.</p>
    ',
                'image' => 'news/clean-girl.png',

            ],
            [
                'title' => '5 Bridal Make-Up Trends voor 2026',
                'content' => '
        <p><strong>Stralen op je grote dag.</strong></p>

        <p>Bridal make-up evolueert richting zachtere looks met een focus op natuurlijke schoonheid.</p>

        <h2>Trending bij bridal artists</h2>

        <ul>
            <li>Soft glam met warme tinten</li>
            <li>Glowy skin zonder heavy contour</li>
            <li>Natuurlijke lashes en glossy lips</li>
        </ul>

        <p>Less is more blijft ook in 2026 de sleutel.</p>
    ',

                'image' => 'news/bridal-makeup.png',

            ],
            [
                'title' => 'Glass Hair: de haartrend die social media verovert',
                'content' => '
        <p><strong>Ultieme glans, strak afgewerkt.</strong></p>

        <p>Glass hair staat voor gezond, spiegelglad haar en blijft een favoriet bij hairstylists.</p>

        <h2>Waarom glass hair zo populair is</h2>

        <ul>
            <li>Perfect afgewerkte snit</li>
            <li>Intense glans dankzij stylingproducten</li>
            <li>Ideaal voor fotoshoots en events</li>
        </ul>

        <p>Een trend die luxe en eenvoud combineert.</p>
    ',

                'image' => 'news/glass-hair.png',

            ],



        ];

        foreach ($items as $item) {
            News::create([
                'title' => $item['title'],
                'content' => $item['content'],
                'image' => $item['image'],
                'user_id' => $user->id,
            ]);
        }
    }
}

